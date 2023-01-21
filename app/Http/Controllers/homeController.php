<?php

namespace App\Http\Controllers;
use App\Models\userModel;
use Hash;
use Auth;
use Session;
use Alert;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //Goto Register Page
    public function registerPage()
    {
        return view('register');
    }

    //Save Data In DataBase
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required | unique:users',
            'password'=>'required | confirmed'
        ]);

        $user = new userModel();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->type = 1;
        $user->password = Hash::make($request->password);
        $user->photourl = $request->photourl;
        $user->save();

        return view('login');
        /* redirect()->back(); */
    }

    //Goto Login Page
    public function loginPage(){
        return view('login');
    }

    //Goto Login Page Admin
    public function loginPageAdmin(){
        return view('adminlogin');
    }

    //Goto Dashboard
    public function dashboard(){
        return view('dashboard');
    }

    //Check Data For Login
    public function loginAttempt(Request $request)
    {
        $request->validate([
            'email'=>'required | email',
            'password'=>'required'
        ]);
        $check=Auth::attempt(['email' => $request->email, 'password' => $request->password,'type'=>1]);
        // Auth::guard('admin')->user()

        if($check)
        {
            return "User Login Successfull";
            /* Alert::success('Login','User Login Successfull'); */
            /* return redirect()->route('dashboard'); */
        }
        else
        {
            Alert::error('Login','User Login Failed');
            return redirect()->route('loginPage');
        }
    }

    public function loginAttemptAdmin(Request $request)
    {
        $request->validate([
            'email'=>'required | email',
            'password'=>'required'
        ]);
        $check=Auth::attempt(['email' => $request->email, 'password' => $request->password,'type'=>0]);

        if($check)
        {
            Alert::success('Login','Admin Login Successfull');
            return redirect()->route('dashboard');
            /* return 'Admin Login Successfull'; */
        }
        else
        {
            Alert::error('Login','Admin Login Failed');
            return redirect()->route('loginPageAdmin');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        Alert::success('Logout','Logout Successfull');
        return redirect()->route('loginPage');
    }
}

