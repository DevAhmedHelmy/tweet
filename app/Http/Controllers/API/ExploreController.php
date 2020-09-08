<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;

class ExploreController extends Controller
{
    public function __invoke()
    {
        $users = User::paginate(50);
        return Response(['users' => $users],200);
    }
}
