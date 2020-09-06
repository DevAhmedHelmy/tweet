<?php

namespace Tests\Feature;

use App\Tweet;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TweetTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *@test
     * @return void
     */
    public function it_show_tweets_in_home()
    {
        $this->withOutExceptionHandling();
        $user = $this->siginIn();
        $tweet = factory(Tweet::class)->create(['user_id' => $user->id]);
        $this->get('/home')
            ->assertStatus(200)
            ->assertSee($tweet->body);

    }
    /**
    * @test
    */

     public function it_can_add_tweet()
     {
        $this->withOutExceptionHandling();
        $user = $this->siginIn();
        $this->post('tweets',[
            'user_id' => $user->id,
            'body' => 'test add tweet'
        ]);
        $this->assertDatabaseHas('tweets',[
            'user_id' => $user->id,
            'body' => 'test add tweet'
        ]);
     }
}
