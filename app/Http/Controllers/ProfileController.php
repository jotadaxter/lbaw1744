<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use VAPOR\User;

class ProfileController extends Controller
{
    /**
     * Shows the card for a given id.
     *
     * @param  int  $user_id
     * @return Response
     */

    public function show($user_id)
    {
       $user = User::find($user_id);

      return view('users.profile', ['user' => $user]);
    }

    public function showEdit($user_id)
    {
        $user = User::find($user_id);
      return view('users.edit_profile', ['user' => $user]);
    }

    public function update(Request $request, $user_id)
    {
       $request->validate([
            'username' => 'string|max:16',
            'fullname' => 'string|max:255',
            'email' => 'string|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'birth_date' =>'nullable|date',
         ]);
        $user = User::find($user_id);
        $user->username = $request->input('username');
        $user->fullname = $request->input('fullname');
        if($request->input('password') != "")
            $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->save();
        return view('users.profile', ['user' => $user]);
    }

    public function showPasswordReset()
    {
        return view('password.reset');
    }

    public function passwordReset()
    {

    }
}

