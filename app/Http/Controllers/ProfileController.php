<?php

namespace VAPOR\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use VAPOR\Mail\ResetPWMail;
use VAPOR\User;
use Image;

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
            'nif' => 'digits:9|max:9',
            'phone_number' => 'numeric',
         ]);
        $user = User::find($user_id);
        $user->username = $request->input('username');
        $user->fullname = $request->input('fullname');
        if($request->input('password') != "")
            $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->nif = $request->input('nif');
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

    public function changeAvatar(Request $request, $user_id)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)
                ->resize(300, 300)
                ->save( public_path('/uploads/profile_images/' . $filename));

            $user = Auth::user();
            $user->img = $filename;
            $user->save();
        }

        return redirect()->route('profile', $user_id );
    }

    public function showSettings($user_id)
    {
        $user = User::find($user_id);
        return view('users.settings', ['user' => $user]);
    }

    public function showMyProducts($user_id)
    {
        $user = User::find($user_id);
        return view('users.myProducts', ['user' => $user]);
    }
	
	public function addProduct($user_id)
    {
        $user = User::find($user_id);
        return view('sellers.product_add', ['user' => $user]);
    }
	
    public function showWishList($user_id)
    {
        $user = User::find($user_id);
        return view('users.wishlist', ['user' => $user]);
    }
}

