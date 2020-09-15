<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;

class ProfileTest extends TestCase
{
    use RefreshDatabase;
    /**
    * @test
    */
    public function it_show_profile_page()
    {
        $user = $this->siginIn();
        $this->get(route('user.profile', $user->username))
            ->assertStatus(200)
            ->assertSee($user->username);
    }
    /**
     * @test
    */
    public function it_user_following()
    {
        $this->withOutExceptionHandling();
        $user = $this->siginIn();
        $this->post(route('follow', $user->username))
              ->assertStatus(302)
              ->assertRedirect('profiles/'.$user->username);
    }
    /**
     * @test
     *
    */
    public function update_displays_validation_errors()
    {
        $this->withExceptionHandling();
        $user = $this->siginIn();
        $response = $this->patch($user->path(), []);
        $response->assertSessionHasErrors();
        $response->assertStatus(302);

    }
    /**
     * @test
     */
    public function it_can_update_profile()
    {

        $user = $this->siginIn();

        $data=[
            'name' => 'he7my',
            'username' => $user->username,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];
        $this->patch($user->path(),$data);
        $this->assertTrue($user->fresh()->username == $user->username);
    }
}
