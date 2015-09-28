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

use Illuminate\Support\Collection;
use Shin1x1\TwiliojpOsaka\Application\Service\TelephoneService;
use Shin1x1\TwiliojpOsaka\Domain\Entity\Receiver;
use Shin1x1\TwiliojpOsaka\Domain\Repository\ReceiverRepository;
use Shin1x1\TwiliojpOsaka\Domain\ValueObject\TelephoneNo;

$router->get('/', function () {
    return view('welcome');
});

$router->get('/calling', function (TelephoneService $service, ReceiverRepository $receiverRepository) {
    $receivers = $receiverRepository->findAll();
    if (!($receivers instanceof Collection)) {
        $receivers = collect($receivers);
    }

    $fromNo = new TelephoneNo(env('TWILIO_TEL_NO'));
//    $url = url('/twilio/hoge.xml');
    $url = url('http://demo.twilio.com/docs/voice.xml');

    // TODO: エラー処理、連携部分のログ化
    $receivers->each(function (Receiver $receiver) use ($service, $fromNo, $url) {
        $service->calling($fromNo, $receiver, $url);
    });
});
