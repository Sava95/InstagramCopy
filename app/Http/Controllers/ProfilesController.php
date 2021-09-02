<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user) :false ;
        
        return view('profiles.index', [
            'user' => $user,
            'follows' => $follows,
        ]);
    }

    public function edit(User $user) {
        
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {

        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required', 
            'url' => 'url',
            'image' => '',
        ]);

        // $user->profile->update($data);   this way someone can just go into your profile though the URL and change it, not safe

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public'); // stores the file in storage/app/public/profile folder

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);   // it doesnt resize it, it fits it to 1200x1200px
            $image->save();

            auth()->user()->profile->update(array_merge($data, ['image' => $imagePath] )); // calls an error if an non auth user tries to edit your profile , array_merge overwrittes the key 'image' 

        } else {
            auth()->user()->profile->update($data); 

        }
        
        
        return redirect("/profile/{$user->id}");
    }
}
