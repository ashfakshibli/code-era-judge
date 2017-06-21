<?php

namespace Tests\Unit;

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateContestTest extends IntegrationTest
{
	protected $baseUrl = 'http://localhost:8000';

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateContest()
    {
        $this->visit('/admin_login')
            ->type('admin@admin.com', 'email')
            ->type('123456', 'password')
            ->press('Login')
            ->see('Admin')
            ->onPage('/admin_home')
            ->visit('/create_contest')
            ->see('Create New Contest')
            ->type('Contest Test', 'title')
            ->type('21/06/2017 0:00 - 25/06/2017 23:59','start_end_time')
            ->type('Test Contest Description','description')
            ->press('Create')
            ->see('The contest has been created')
            ->type('Test Problem', 'title')
            ->type('Test Problem Description','description')
            ->type('Test Input','input')
            ->type('Test Output','output')
            ->press('Create')
            ->see('Problem added to the contest');
    }
}
