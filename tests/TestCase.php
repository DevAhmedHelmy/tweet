<?php

namespace Tests;

use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;
    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
    }
    protected function siginIn($user = null)
    {
        $user = $user ?: factory('App\User')->create();
        $this->actingAs($user);
        return $user;
    }

    protected function apiSiginIn($user = null)
    {
        $user = $user ?: factory('App\User')->create();
        $this->actingAs($user , 'api');
        return $user;
    }
}
