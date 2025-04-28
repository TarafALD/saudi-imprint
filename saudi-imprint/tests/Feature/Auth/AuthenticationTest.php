<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;// It avoids tests affecting each other

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/loginTG');
        

        $response->assertStatus(200);
    }

    
    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/loginTG', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }

    public function test_authenticated_user_sees_correct_dashboard_link_in_navbar()
    {
        
        $user = User::factory()->create([
            'role' => 'admin', 
        ]);
    
        $this->actingAs($user);
    
        $response = $this->get('/');
    
        $response->assertStatus(200);
    
        // Assert that the admin dashboard link is visible
        $response->assertSee('Admin Dashboard');
    }
}
