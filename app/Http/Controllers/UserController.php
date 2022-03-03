<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * constructor 
     */
    function __construct()
    {
        $this->view = '.frontend.';
    }

    /**
     * User register  
     */
    public function register(Request $request)
    {
        $user = new User();
        if (empty($request->name))
        {
            toastr()->warning('please enter your name');
        } elseif (empty($request->email))
        {
            toastr()->warning('please enter your email');
        } elseif (empty($request->password))
        {
            toastr()->warning('please enter your password');
        } elseif (empty($request->image))
        {
            toastr()->warning('please select your image');
        }
        elseif ($user)  
        {
            $user->name = $request->name ?? '';
            $user->email = $request->email ?? '';
            $user->password = Hash::make($request->password)?? '';
            $user->image = $request->image ?? '';
            $user->save();
            toastr()->success('Registration has been successfull!');
        } else {
            toastr()->error('An error has occurred please try again later.');
        }
        return back();
    }
}
