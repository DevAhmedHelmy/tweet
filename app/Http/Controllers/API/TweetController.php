<?php

namespace App\Http\Controllers\API;

use App\Tweet;
use Illuminate\Http\Request;
use App\Http\Requests\TweetRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\TweetResource;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $tweets = TweetResource::collection(auth()->user()->timeline());
        return response(['tweets' => $tweets],200);
    }

    public function store(TweetRequest $request)
    {

        $data = $request->validated();

        $tweet = auth()->user()->tweets()->create($data);
        return Response(['message' => "saved", 'tweet' => $tweet],201);
    }
}
