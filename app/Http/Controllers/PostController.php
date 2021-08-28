<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // entering any of the below function(routes) will require the user to be logged in
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

        $imagePath = request('image')->store('uploads', 'public'); // stores the file in storage/app/public/uploads folder

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);   // it doesnt resize it, it fits it to 1200x1200px
        $image->save();
        
        auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imagePath
        ]);


        // auth()->user()->posts()->create($data);  // this way Laravel knows how to fill in the user_id 
        // Post::create($data); //  or $post = new Post; $post->title = $request->input('title') ... ;
        // this will bring out an error since we are missing the user_id

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show (Post $post) {

        
        return view('posts.show', compact('post'));
    }
}
 