<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExploreTest extends TestCase
{
    /*
    * @return void
    */
    public function testExample()
    {
        $this->siginIn();
        $response = $this->get('/explore');
        $response->assertStatus(200);
    }
}
