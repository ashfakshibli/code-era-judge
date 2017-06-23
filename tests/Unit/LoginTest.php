<?php

namespace Tests\Unit;

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

class LoginTest extends IntegrationTest
{
    protected $baseUrl = 'http://localhost:8000';
    /**
     * A login test example.
     *
     * @return void
     */

    /** @test */
    public function testLogin()
    {
        $this->visit('/login')
            ->type('shibli.emon@gmail.com', 'email')
            ->type('654321', 'password')
            ->press('Login')
            ->see('Ashfak')
            ->onPage('/home');
    }
}
