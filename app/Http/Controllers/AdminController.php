<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
    public function loginHandler(Request $request){
        $fielfType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL)? 'email' : 'username'; 

        if($fielfType === 'email'){
            $request->validate([
                'login_id' => 'required|email|exists:admins,email', 
                'password' => 'required|min:5|max:45'
            ],
            [
                'login_id' => 'check your email', 
                'password' => 'check your password', 
            ] 
        );
        }
        else{
            $request->validate([
                'login_id' => 'required|exists:admins,username', 
                'password' => 'required|min:5|max:45'
            ],
            [
                'login_id' => 'check your email', 
                'password' => 'check your password', 
            ]);
        }

        $crids = array(
            $fielfType => $request->login_id,
            'password' => $request->password
        );
        if( Auth::guard('admin')->attempt($crids)){
            return redirect()->route('admin.home');
        }
        else{
            session()->flash('fail', 'Incorect cridentials');
            return redirect()->route('admin.login');
        }
    }
    public function logoutHandler(){
        Auth::guard('admin')->logout();
        session()->flash('flash', 'logedout');
        return redirect()->route('admin.login');
    }
}
