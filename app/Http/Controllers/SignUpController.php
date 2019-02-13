<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
//user is in the namespace model

class SignUpController extends Controller
{
    //define index and sign up
    public function index() {
      return view('signup');
    }

    public function signup() {
      $user = new User();
      $user->email = request('email'); // instead of passing request through parameters
      $user->password = Hash::make(request('password')); //bcrypt
      $user->save();

      Auth::login($user);
      return redirect('/profile');

      // return redirect('/login');
    }
}
