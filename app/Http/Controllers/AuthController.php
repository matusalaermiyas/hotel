<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Report;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function signin()
    {
        return view('auth.signin');
    }

    function signin_post(Request $request)
    {
        $user = Account::where('username', $request['username'])->first();

        if (!$user || $user['password'] != $request['password']) {
            Session::flash('error', 'Invalid username or password');
            return redirect()->back();
        }

        if ($user['role'] == 'reception' || $user['role'] == 'casher') {
            Report::create([
                'role' => $user['role'],
                'description' => 'Logged into the system',
                'employee_id' => $user['employee_id']
            ]);
        }

        if ($user['role'] != 'customer') session()->put('employee_id', $user->employee_id);


        session()->put('logged', true);
        session()->put('role', $user['role']);
        session()->put('username', $user['username']);

        $role = $user['role'] . '.dashboard';

        Session::flash('success', 'Logged in successfully');
        return redirect()->route($role);
    }

    function signup()
    {
        return view('auth.signup');
    }

    function signup_post(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'city' => 'required',
            'state_or_province' => 'required',
            'country' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'username' => 'required',
        ]);


        $account = Account::where('username', $request['username'])->first();

        if ($account) {
            Session::flash('error', 'Username already taken try again');
            return redirect()->back();
        }

        if ($request['password'] != $request['confirm_password']) {
            Session::flash('error', 'Confirm password do not match try again');
            return redirect()->back();
        }

        Account::create($request->except(['_token', 'confirm_password']));

        Session::flash('success', 'Account created successfully');

        return redirect()->route('auth.signin');
    }

    function changePassword()
    {
        return view('auth.change_password');
    }

    function changePasswordStore(Request $request)
    {
        $account = Account::where('username', session()->get('username'))->first();

        if (!$account) return;

        if ($account->password != $request['old_password']) {
            Session::flash('error', 'The Password You Entered Is Incorrect');
            return redirect()->route('auth.change.password');
        } else if ($request['new_password'] != $request['confirm_password']) {
            Session::flash('error', 'Password Confirmation Do Not Match');
            return redirect()->route('auth.change.password');
        }

        if ($account->password != $request['new_password']) $account->update(['password' => $request['new_password']]);

        Session::flash('success', 'Password Updated Successfully');
        session()->remove('logged');
        session()->remove('role');
        session()->remove('username');

        return redirect()->route('auth.signin');
    }

    function logout()
    {
        session()->remove('logged');
        session()->remove('role');
        session()->remove('username');

        return redirect()->route('home');
    }
}
