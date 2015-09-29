<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/**
 * @var \Illuminate\Routing\Router $router
 */

use App\Http\Requests\GatheringRequest;
use Illuminate\Support\Collection;
use Shin1x1\TwiliojpOsaka\Application\Service\TelephoneService;
use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\Repository\ReceiverRepository;
use Shin1x1\TwiliojpOsaka\Domain\Service\GatherCommandFactory;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

$router->get('/', function () {
    return view('welcome');
});

$router->group(['prefix' => '/twilio'], function () use ($router) {
    $router->get('/calling', function (TelephoneService $service, ReceiverRepository $receiverRepository) {
        $receivers = $receiverRepository->findAll();
        if (!($receivers instanceof Collection)) {
            $receivers = collect($receivers);
        }

        $fromNo = new TelephoneNo(env('TWILIO_TEL_NO'));
        $url = url('/calling/response');

        // TODO: エラー処理、連携部分のログ化
        $receivers->each(function (Receiver $receiver) use ($service, $fromNo, $url) {
            $service->calling($fromNo, $receiver, $url);
        });

        return response('ok');
    });

    $router->post('/calling/response', function () {
        return response()->view('twilio.response', [], 200, ['Content-type' => 'text/xml']);
    });

    $router->post('/gathering', function (GatheringRequest $request) {
        $pushed = $request->input('Digits');
        $telNo = new TelephoneNo($request->input('To'));

        $receiver = new Receiver($telNo, ''); // name is dummy

        $command = GatherCommandFactory::create($pushed, $receiver);
        $command->execute($pushed);

        if ($command->isRetry()) {
            $template = 'twilio.response';
        } else {
            $template = 'twilio.complete';
        }

        return response()->view($template, [], 200, ['Content-type' => 'text/xml']);
    });

});

