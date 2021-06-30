<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function checkLogin(Request $request){
        $userName = $request->input('txtname');
        $password = $request->input('txtpassword');
        $user =DB::table('users')->where(['userName'=>$userName])->first();
        if($user !=null && $user->password == $password){
            $request->session()->push("user",$user);
            switch($user->role){
                case("SA1"):
                case("LO1"):
                case("HR1"):
                case("AC1"):
                    return redirect()->route('users.index');
                break;
                case("SA2"):
                case("LO2"):
                case("HR2"):
                case("AC2"):
                    return redirect()->route('home');
                break;
            default:
            return view('welcome');
            }
        }
        else{
            return view('login')->with(['message' => 'Invalid ID and Password']);
        }

    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('login');
    }
}
