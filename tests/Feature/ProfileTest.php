<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
    */
    public function it_show_profile_page()
    {
        $user = $this->siginIn();
        $this->get(route('user.profile', $user->name))
            ->assertStatus(200)
            ->assertSee($user->name);
    }
    /**
     * @test
    */
    public function it_user_can_following()
    {
        $this->withOutExceptionHandling();
        $user = $this->siginIn();
        $this->post(route('follow', $user))->assertSee($user->name);;
    }
    /**
     * @test
     */
    public function it_can_update_profile()
    {
        $this->withOutExceptionHandling();
        $user = $this->siginIn();
        $data=[
            'name' => 'he7my',
            'username' => $user->username,
            'email' => $user->email,
            'password' => ''
        ];
        $this->patch($user->path(),$data);
        $this->assertTrue($user->fresh()->name == 'he7my');
    }
}
