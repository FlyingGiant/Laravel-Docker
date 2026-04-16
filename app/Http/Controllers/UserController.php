<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
    {
        //get all user from db
        $users = User::all(); 
        
        //return user and compact user to view
        return view('users.index', compact('users'));
    } 

//Get
public function show($id) {
    $user = User::find($id); 
    return view('users.show', compact('user'));
}

//Post
public function store(Request $request) {
    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt('123456'), // Mật khẩu mặc định
    ]);
    return redirect()->back();
}

//Update
public function update(Request $request, $id) {
    $user = \App\Models\User::find($id);
    $user->update($request->only('name', 'email'));
    return redirect()->back();
}

//Delete
public function destroy($id) {

    \App\Models\User::destroy($id);
    return redirect()->back();
}
}