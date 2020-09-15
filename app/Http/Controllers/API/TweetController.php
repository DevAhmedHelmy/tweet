<?php

namespace App\Http\Controllers\API;

use App\Tweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TweetResource;

class TweetController extends Controller
{

    public function index()
    {
        // $tweets = auth()->user()->timeline();

        $tweets = TweetResource::collection(auth()->user()->timeline());
        return Response(['tweets' => $tweets],200);
        return view('tweets.index',['tweets' => $tweets]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => ['required','max:255']
        ]);
        auth()->user()->tweets()->create($data);

        return redirect('home')->with('message','Successfuly');
    }
}
