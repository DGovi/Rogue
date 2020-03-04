<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testViewRegistration()
    {
        $response = $this->get('/register');
        
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function testNewRegistration()
    {
        $user = [
            'name' => 'NameTest',
            'email' => 'test@test.com',
            'username' => 'usernameTest',
            'password' => 'test123456',
            'password_confirmation' => 'test123456'
        ];

        $response = $this->post('/register', $user);

     
        $response->assertRedirect('/');
       
        // Remove password and password-confirmation from array
        array_splice($user, 3, 2);
    }


}
