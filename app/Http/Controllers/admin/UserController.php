<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        if (session()->has('isUserLoggedIn') && session()->get('isUserLoggedIn'))
        return redirect('/superadmin');
        else
            return view('admin.login');
    }

    public function loginUser(Request $req)
    {

        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $req->email;
        $pass = $req->password;
        $user = User::where('email', '=', $email)->get();
        if ($user->count()) {
            $user = $user[0];
            if ($user->role === 'admin') {
                if (password_verify($pass, $user->password)) {
                    session(['isUserLoggedIn' => true, 'user_id' => $user->user_id]);
                    return redirect('/superadmin');
                } else {
                    session()->flash('error', 'Incorrect email or password !!');
                    return redirect()->back();
                }
            } else {
                session()->flash('error', 'Unauthorised User !!');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Incorrect email or password !!');
            return redirect()->back();
        }
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }

    public function updatePassword(Request $req)
    {
        $req->validate([
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $oldPassword = $req->old_password;
        $password = $req->password;

        $user = User::find(session('user_id'));

        if (!is_null($user)) {
            if (password_verify($oldPassword, $user->password)) {
                $user->password = password_hash($password, PASSWORD_BCRYPT);
                $user->save();

                session()->forget('isUserLoggedIn');
                session()->forget('user_id');

                return redirect('/superadmin/login');
            } else {
                session()->flash('error', 'Incorrect old password !!');
                return redirect()->back();
            }
        } else return redirect('/superadmin/login');
    }

    public function logout()
    {
        session()->forget('isUserLoggedIn');
        session()->forget('user_id');
        return redirect('/superadmin/login');
    }
}
