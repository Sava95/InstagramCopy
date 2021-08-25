<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index($user_id)
    {

        $user = User::findOrFail($user_id);

        return view('home', [
            'user' => $user,
        ]);
    }
}
