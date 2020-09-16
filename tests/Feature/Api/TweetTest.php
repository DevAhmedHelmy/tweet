<?php

namespace Tests\Feature\Api;

use App\Tweet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TweetTest extends TestCase
{
    use RefreshDatabase;
    /**
     *@test
     */
    public function it_show_tweets_in_home()
    {
        $user = $this->apiSiginIn();
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
        $user = $this->apiSiginIn();
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
        $user = $this->apiSiginIn();
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
        $user = $this->apiSiginIn();
        $tweet = factory(Tweet::class)->create();

        $this->delete('/tweets/'.$tweet->id.'/like');
        $this->assertDatabaseHas('likes',[
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'liked' => false
        ]);
    }
}
