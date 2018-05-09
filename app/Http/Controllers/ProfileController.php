<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use VAPOR\Mail\ResetPWMail;
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

    public function passwordReset(Request $request, \Illuminate\Mail\Mailer $mailer)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|exists:Users'
        ]);

        $user = \VAPOR\User::where('email', '=', $request->input('email'))->get();

        $code=md5(microtime());
        //send email
        $mailer->to($request->input('email'))
               ->send(new ResetPWMail($code));


        return view('password.confirmation', ['code' => $code])
            ->with('user_demo', $user);
    }

    public function showPasswordConfirmation()
    {
        return view('password.confirmation');
    }

    public function passwordConfirmation(Request $request)
    {
        if($request->input('code')==$request->input('confirmation_code')){
            //goto change password


            return view('password.change')
                ->with('user_demo', $request->input('user_demo'));
        }
        else{
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('confirmation_code', 'Code is Incorrect');
            return view('password.confirmation')
                ->withErrors($errors)
                ->with('code', $request->input('code'))
                ->with('user_demo', $request->input('user_demo'));
        }


    }

    public function showPasswordChange()
    {
        return view('password.change');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'password' => 'string|min:6|confirmed',
        ]);
        $user = $request->input('user_demo');
        $user->password = bcrypt($request->input('password'));

        \Flash::message('bla');
        return redirect('password.changeSuccess');

    }

    public function showChangeSuccess()
    {

        return ('password.changeSuccess');
    }
}

