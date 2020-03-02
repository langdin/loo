<?php

namespace loo\Http\Controllers;

use Illuminate\Http\Request;
use loo\User;

class FollowsController extends Controller
{
    //
    public function store(User $user) {
        return auth()->user()->following()->toggle($user->profile);
    }
}
