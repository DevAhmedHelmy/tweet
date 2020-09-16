<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Response;
class ExploreTest extends TestCase
{
    use RefreshDatabase;
    /**
    * @test
    */
    public function it_can_show_explore()
    {
        $this->apiSiginIn();
        $response = $this->get('/api/explore');
        $response->assertStatus(200);
    }
}
