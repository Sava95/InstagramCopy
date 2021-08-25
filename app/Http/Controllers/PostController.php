<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Post;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function create() {

        return view('posts.create');
    }

    public function store() {

        $data = request()->validate([
            // 'some variable' => '', when you want to use Post::create($data) but you dont want to valiade all the data, quick solution
            'title' => 'required',
            'description' => 'required',
            'image' => 'required |image'  // or ['required', 'image']
        ]);

        auth()->user()->posts()->create($data);  // this was Laravel knows how to fill in the user_id 



        // Post::create($data); //  or $post = new Post; $post->title = $request->input('title') ... ;
        // this will bring out an error since we are missing the user_id

        dd(request()->all());
    }
}
 