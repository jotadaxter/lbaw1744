<?php

namespace VAPOR\Http\Controllers\Auth;

use VAPOR\User;
use VAPOR\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use VAPOR\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:16|unique:Users',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:Users',
            'password' => 'required|string|min:6|confirmed',
            'birth_date' =>'required|date',
            'nif' => 'digits:9|max:9',
            'phone_number' => 'numeric',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \VAPOR\User
     */
    protected function create(array $data)
    {
        $temp = str_replace('-', '/', $data['birth_date']);
        $temp = date('Y/m/d', strtotime($temp));

        Mail::to($data['email'])
            ->send(new Welcome($data['username']));
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'birth_date' => $temp,
            'nif' => $data['nif'],
            'confirmation_code' => "",
        ]);
    }
}
