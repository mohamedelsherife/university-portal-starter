<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Verifies the login system: the form loads, the dashboard is protected,
 * the seeded credentials work, bad credentials are rejected, and logout
 * ends the session.
 */
class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(); // seeds the demo admin user (admin@uni.edu / password)
    }

    public function test_login_page_loads(): void
    {
        $this->get('/login')->assertOk()->assertSee('Sign in');
    }

    public function test_guest_cannot_reach_the_dashboard(): void
    {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_user_can_log_in_with_seeded_credentials(): void
    {
        $this->post('/login', [
            'email' => 'admin@uni.edu',
            'password' => 'password',
        ])->assertRedirect('/dashboard');

        $this->assertAuthenticated();
    }

    public function test_wrong_password_is_rejected(): void
    {
        $this->from('/login')->post('/login', [
            'email' => 'admin@uni.edu',
            'password' => 'not-the-password',
        ])->assertRedirect('/login')->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_authenticated_user_sees_the_dashboard(): void
    {
        $user = User::where('email', 'admin@uni.edu')->first();

        $this->actingAs($user)->get('/dashboard')->assertOk()->assertSee('Portal Admin');
    }

    public function test_user_can_log_out(): void
    {
        $user = User::where('email', 'admin@uni.edu')->first();

        $this->actingAs($user)->post('/logout')->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_register_page_loads(): void
    {
        $this->get('/register')->assertOk()->assertSee('Sign up');
    }

    public function test_user_can_register_and_is_logged_in(): void
    {
        $this->post('/register', [
            'name' => 'New Student',
            'email' => 'new.student@uni.edu',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ])->assertRedirect('/dashboard');

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'new.student@uni.edu']);
    }

    public function test_register_requires_matching_password_confirmation(): void
    {
        $this->from('/register')->post('/register', [
            'name' => 'Mismatch',
            'email' => 'mismatch@uni.edu',
            'password' => 'secret123',
            'password_confirmation' => 'different',
        ])->assertRedirect('/register')->assertSessionHasErrors('password');

        $this->assertGuest();
    }

    public function test_register_rejects_a_duplicate_email(): void
    {
        $this->from('/register')->post('/register', [
            'name' => 'Dupe',
            'email' => 'admin@uni.edu', // already seeded
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ])->assertRedirect('/register')->assertSessionHasErrors('email');
    }
}