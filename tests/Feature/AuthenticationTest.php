<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * Test that we need to have in this file will be:
     *  - user can view register / login form
     *  - user can not view login after authenticated
     *  - user can login with correct credentials
     *  - user can not login with a non-existent email
     *  - user can not login with incorrect password
     *  - user can log out after authenticated
     *  
     */

    /**
     * Test if user can access register form.
     * @return void
     */
    public function test_user_can_view_register_form(){
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    /**
     * Test if user can access login form.
     * @return void
     */
    public function test_user_can_view_login_form(){
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }


    /**
     * Test user can not view login form after authenticated.
     * @return void
     */
    public function test_user_should_not_access_login_form_after_authenticated(){
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');
    }

    /**
     * Test user can login with correct credentials.
     * @return void
     */
    public function test_user_can_login_with_correct_credentials(){
        $requestAccountInfo = [
            'email'    => 'admin@gmail.com',
            'password' => 'admin123',
        ];

        $response = $this->post('/login', $requestAccountInfo);
        $response->assertRedirect('/home');

        $exptedAdminUser = auth()->user(); // in this case it was 'admin' user
        $this->assertAuthenticatedAs( $exptedAdminUser );
    }

    /**
     * Test can not login with a non existent email.
     * @return void
     */
    public function test_user_can_not_login_with_in_correct_email_credentials(){
        $requestAccountInfo = [
            'email'    => 'demo@gmail.com',
            'password' => 'demo123',
        ];

        $response = $this->post('/login', $requestAccountInfo);
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('email');

        $this->assertGuest();
    }
}
