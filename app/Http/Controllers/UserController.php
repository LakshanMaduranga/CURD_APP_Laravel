<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = user::all();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

        $new_user = user::create($data);
        return redirect(route('user.index'));
    }

    public function edit(user $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, user $user)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
        $user->update($data);
        return redirect(route('user.index'))->with('message', 'User Updated Successfully');
    }

    public function delete(user $user)
    {
        $user->delete();
        return redirect(route('user.index'))->with('message', 'User Deleted Successfully');
    }
}
