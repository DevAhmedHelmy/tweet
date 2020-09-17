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
        $this->withoutExceptionHandling();
        $user = $this->apiSiginIn();
        $tweet = factory(Tweet::class)->create(['user_id' => $user->id]);
        $this->json('get', 'api/tweets', ['Accept' => 'application/json'])
            ->assertStatus(200);

    }
    /**
     * @test
     *
     * @return void
     */
    public function required_fields_for_add_tweet()
    {
        $this->withoutExceptionHandling();
        $user = $this->apiSiginIn();
        $this->json('POST', 'api/tweets', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "body" => ["The body field is required."]
                ]
            ]);
    }
    /**
     * @test
     *
     * @return void
     */
    public function it_can_add_tweet()
    {

        $user = $this->apiSiginIn();
        $tweet = [
            'user_id' => $user->id,
            'body' => 'test add tweet'
        ];
        $this->json('POST', 'api/tweets', $tweet, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "tweet" => [
                    "body"
                ],
                "message"
            ]);
    }
    /**
     * @test
    */
    public function it_can_like_tweet()
    {
        $user = $this->apiSiginIn();
        $tweet = factory(Tweet::class)->create();
        $this->json('POST', 'api/tweets/'.$tweet->id . '/like', ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "tweet" => [
                    "body"
                ],
                "message"
            ]);
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
