<?php

namespace Tests\Feature\Api;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function required_fields_for_registration()
    {
        $this->json('POST', 'api/auth/register', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                ]
            ]);
    }
    /**
     * @test
     *
     * @return void
     */
    public function repeat_password()
    {
        $userData = [
            "name" => "John Doe",
            'username' => 'ahmed95',
            "email" => "doe@example.com",
            "password" => "demo12345"
        ];
        $this->json('POST', 'api/auth/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "password" => ["The password confirmation does not match."]
                ]
            ]);
    }
    /**
     * @test
     *
     * @return void
     */
    public function successful_registration()
    {
        $this->withoutExceptionHandling();
        $userData = [
            "name" => "John Doe",
            "email" => "doe@example.com",
            'username' => 'ahmed',
            "password" => "demo12345",
            "password_confirmation" => "demo12345"
        ];

        $this->json('POST', 'api/auth/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "user" => [
                    "username" ,
                    "name" ,
                    "email" ,
                    "updated_at" ,
                    "created_at" ,
                    "id"
                ],
                "access_token",
                "message"
            ]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function required_fields_for_login()
    {
        $this->json('POST', 'api/auth/login', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                ]
            ]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function successful_login()
    {
        User::create([
            "name" => "John Doe",
            "email" => "doe@example.com",
            'username' => 'ahmed',
            "password" => "demo12345",
            "password_confirmation" => "demo12345"
        ]);
        $userData = [
            "email" => "doe@example.com" ,
            "password" => "demo12345"
        ];

        $response = $this->json('POST', 'api/auth/login', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "user" => [
                    "username" ,
                    "name" ,
                    "email" ,
                    "updated_at" ,
                    "created_at" ,
                    "id"
                ],
                "access_token",
                "message"
            ]);
        $this->assertArrayHasKey('access_token',$response->json());
    }


}
