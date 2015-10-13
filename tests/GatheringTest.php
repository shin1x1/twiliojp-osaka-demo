<?php

use App\GatheringLog;

class GatheringTest extends TestCase
{
    /**
     *
     */
    public function setUp()
    {
        parent::setUp();

        (new GatheringLog())->truncate();
    }

    /**
     * @test
     */
    public function gathering_no_parameters()
    {
        $this->post('/twilio/gathering', [])->assertResponseStatus(302);
    }

    /**
     * @test
     */
    public function gathering_pushed_1()
    {
        $this->post('/twilio/gathering', ['Digits' => '1', 'To' => '+81612345678'])
            ->see('<Say')
            ->dontSee('<Gather');

        $log = GatheringLog::query()->first();
        $this->assertSame('1', $log->pushed);
        $this->assertSame('+81612345678', $log->telephone_no);
    }

    /**
     * @test
     */
    public function gathering_pushed_2()
    {
        $this->post('/twilio/gathering', ['Digits' => '2', 'To' => '+81612345678'])
            ->see('<Say')
            ->see('<Gather');
    }
}
