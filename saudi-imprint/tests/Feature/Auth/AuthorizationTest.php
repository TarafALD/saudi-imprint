<?php
namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    public function test_tourist_user_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'tourist',]);
    
        $this->actingAs($user);
    
        $response = $this->get('/Admin/dashboard');
    
        $response->assertForbidden(); //HTTP 403 Forbidden
    }
    
    
}