<?php

namespace Tests\Unit;

use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SignUpTest extends IntegrationTest
{

	protected $baseUrl = 'http://localhost:8000';
    /**
     * A SignUp test.
     *
     * @return void
     */
    public function testSignUp()
    {
        $response = $this->visit('/register')
            ->type('ABCD', 'name')
            ->type('abcd@gmail.com', 'email')
            ->type('654321', 'password')
            ->type('654321', 'password_confirmation')
            ->press('Register')
            ->see('ABCD')
            ->onPage('/register');

    }
}
