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

        $email = $request->input('email');

        $user = User::where('email', '=', $email)->first();

        $code=md5(microtime());

        //register confirmation_code on user db
        $user->confirmation_code = $code;
        $user->save();

        //send email
        $mailer->to($email)
               ->send(new ResetPWMail($code));

        return redirect()->route('passwordConfirmation')
            ->with('email', $email);
    }

    public function showPasswordConfirmation()
    {

        return view('password.confirmation');
    }

    public function passwordConfirmation(Request $request)
    {

        $email = $request->input('email');

        $user = User::where('email', '=', $email)->first();


        if($request->input('confirmation_code')==$user->confirmation_code){
            //goto change password

            return redirect()->route('passwordChange')
                ->with('email', $email);
        }
        else{
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('confirmation_code', 'Code is Incorrect');
            return redirect()->route('passwordConfirmation')
                ->withErrors($errors)
                ->with('email', $email);
        }


    }

    public function showPasswordChange()
    {
        return view('password.change');
    }

    public function passwordChange(Request $request)
    {
        $email = $request->input('email');
        session([
            'email' => $email
        ]);

        $user = User::where('email', '=', $email)->first();

        //reset confirmation code
        $user->confirmation_code = "";
        $user->save();

        $request->validate([
            'password' => 'string|min:6|confirmed',
        ]);
        if($request->input('password') != "")
            $user->password = bcrypt($request->input('password'));
        $user->save();

        session()->flash('password_changed_success', 'Password was changed with success!');

        return redirect()->route('changeSuccess');

    }

    public function showChangeSuccess()
    {

        return view('password.changeSuccess');
    }

    public function resendConfirmationMail(Request $request, $email, \Illuminate\Mail\Mailer $mailer)
    {
        $user = User::where('email', '=', $email)->first();

        $code=md5(microtime());

        //register confirmation_code on user db
        $user->confirmation_code = $code;
        $user->save();

        //send email
        $mailer->to($email)
            ->send(new ResetPWMail($code));

        return redirect()->route('passwordConfirmation')
            ->with('email', $email);

    }
}

