<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Response;
class ExploreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */

     public function it_can_show_explore()
     {
        $this->get('api/explore')->seeStatusCode(200)->response->getContent();

     }

}
