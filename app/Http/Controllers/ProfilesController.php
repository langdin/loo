<?php

namespace loo\Http\Controllers;

use loo\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    //
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ['required', 'image'],
        ]);

        auth()->user()->profile->update($data);

        return redirect('/profile/' . $user->id);
    }
}
