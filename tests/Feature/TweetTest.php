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
        $this->get(route('tweets.index'))
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

    /**
     * @test
    */
    public function it_can_like_tweet()
    {
        $this->withOutExceptionHandling();
        $user = $this->siginIn();
        $tweet = factory(Tweet::class)->create();

        $this->post('/tweets/'.$tweet->id.'/like');
        $this->assertDatabaseHas('likes',[
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'liked' => true
        ]);
    }

    /**
     * @test
    */
    public function it_can_unLike_tweet()
    {
        $this->withOutExceptionHandling();
        $user = $this->siginIn();
        $tweet = factory(Tweet::class)->create();

        $this->delete('/tweets/'.$tweet->id.'/like');
        $this->assertDatabaseHas('likes',[
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'liked' => false
        ]);
    }
}
