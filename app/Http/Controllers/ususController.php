<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\UsusModel;

class ususController extends Controller
{
    function RegisterUser(Request $request)
    {
        $name = $request->input('name');
        $username = $request->input('username');
        $password = $request->input('password');

        $table_susu =  new UsusModel();

        $table_susu->name = $name;
        $table_susu->username = $username;
        $table_susu->password = Hash::make($password);

        $table_susu->save();
        
        session()->put('PathName', 'login');
        return redirect('/login')->with('message_Sre' ,'successfully registered');
    }

    function ChOFDuser(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if(Auth::attempt(['username' => $username, 'password' => $password]))
        {
            //Authentication completed successfully
            return redirect('/index');
        }

        return 'Incorrect login information'; 
    }

    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/login");
    }
}
