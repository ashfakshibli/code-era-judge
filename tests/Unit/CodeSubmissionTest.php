<?php

namespace Tests\Unit;

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CodeSubmissionTest extends IntegrationTest
{
	protected $baseUrl = 'http://localhost:8000';

    /**
     * A code submit test example.
     *
     * @return void
     */
    public function testSubmitCode()
    {
        $this->visit('/login')
            ->type('shibli.emon@gmail.com', 'email')
            ->type('654321', 'password')
            ->press('Login')
            ->see('Ashfak')
            ->onPage('/home')
            ->visit('/problem/6')
            ->click('submit_output')
            ->whenAvailable('.modal', function ($modal) {
                        $modal->attachFile('file', 'D:\SoftProjects\CodeCuet\Codes\divider.c')
                                 ->press('Submit');
                    })
            ->see('Successfully Submitted Solution');
        
    }
}
