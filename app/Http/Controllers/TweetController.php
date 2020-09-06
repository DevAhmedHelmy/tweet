<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = auth()->user()->timeline();
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
