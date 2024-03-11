<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Auth\UsersModel;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $username = $request->username;
        $password = $request->password;

        $user = DB::table('user')->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user->password)) {
                $userData = [
                    'id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                ];

                if ($user->role === 'PROPERTY') {
                    return redirect('/dash-prop')->with('success', "You are now logged in.");
                } else if ($user->role == 'ACCOUNTING') {
                    return redirect('/dash-accounting')->with('success', "Welcome Admin!");
                } else {
                    return redirect()->back()->with('failed', "Invalid Role");
                }
            } else {
                return redirect()->back()->with('failed', "Wrong Password");
            }
        } else {
            return redirect()->back()->with('failed', "Account does not exist");
        }
    }


    public function register(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ];

        $messages = [
            'username.required' => 'Username is required.',
            'password.required' => 'Password is required.',
            'role.required' => 'Role is required.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $random = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&";
        $token = substr(str_shuffle($random), 0, 50);

        // Extract username, password, and role from request
        $username = $request->input('username');
        $password = $request->input('password');
        $role = $request->input('role');

        // Create a new user instance
        $user = new UsersModel();
        $user->username = $username;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->role = strtoupper($role);
        $user->save();

        if($user){
            return redirect('/')->with('success', 'Successfully registered');
        }
    }

    public function resetPassword(Request $request)
    {
        $rules = [
            'username' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ];

        $messages = [
            'username.required' => 'Username is required.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 8 characters long.',
            'confirm_password.required' => 'Confirm password is required.',
            'confirm_password.same' => 'Confirm password must match the new password.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Fetch the user from the database based on the provided username
        $user = UsersModel::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->back()->with('failed', 'User not found.');
        }

        // Update the user's password
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect('/')->with('success', 'Password reset successfully.');
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('success', 'You have been logged out.');
    }

}
