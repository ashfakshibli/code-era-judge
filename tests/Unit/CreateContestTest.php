<?php

namespace Tests\Unit;

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

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
            ->see('Add Problem')
            ->submitForm('Create', [
            	'title' => 'Test Problem',
            	'description' => 'Test Problem Description',
            	'input' => 'Test Input',
            	'output' => 'Test Output',

            	])
            ->see('Problem added to the contest');
    }
}
