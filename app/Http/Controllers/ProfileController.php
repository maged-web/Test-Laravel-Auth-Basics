<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user=auth()->user();
        $user->name=$request->input('name');
        $user->email=$request->input('email');

        if($request->filled('password'))
        {
            $user->password=bcrypt($request->input('password'));
        }
        // Task: fill in the code here to update name and email
        // Also, update the password if it is set
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
