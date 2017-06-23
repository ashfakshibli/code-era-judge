<?php

namespace Tests\Unit;

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

class SignUpTest extends IntegrationTest
{

	protected $baseUrl = 'http://localhost:8000';
    /**
     * SignUp test.
     *
     * @return void
     */
    public function testSignUp()
    {
        $response = $this->visit('/register')
            ->type('Test User', 'name')
            ->type('test1@gmail.com', 'email')
            ->type('654321', 'password')
            ->type('654321', 'password_confirmation')
            ->press('Register')
            ->see('Test')
            ->onPage('/home');

    }
}
