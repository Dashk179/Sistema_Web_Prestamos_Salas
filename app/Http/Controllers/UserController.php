<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index()
    {
        $user = User::all();
        return view('auth.register', ['usuarios' => $user]);
    }

    public function delete(Request $request, $userId)
    {
        $user = (User::find($userId));
        $user->delete();

        return redirect()->back();
    }
}
