<?php

namespace Tests\Unit;

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LinkTest extends IntegrationTest
{
	protected $baseUrl = 'http://localhost:8000';

    /**
     * A Link test example.
     *
     * @return void
     */
    public function testProblemLink()
    {
        $this->visit('/')
             ->click('Problems')
             ->see('AAA')
             ->seePageIs('/problems');
    }
}
