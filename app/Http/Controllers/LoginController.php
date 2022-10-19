<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password is incorrect.');
            }
        } else {
            return back()->with('fail', 'Invalid Username.');
        }
    }

    public function dashboard()
    {
        $data = [];
        if (session()->has('loginId')) {
            $data = User::where('id', session()->get('loginId'))->first();
        }
        return view('dashboard', compact('data'));
    }

    public function logout()
    {
        if (session()->has('loginId')) {
            session()->forget('loginId');
            return redirect('login');
        }
        // auth()->logout();
        // return redirect('/login');
    }
}
