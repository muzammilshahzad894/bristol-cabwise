<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required|min:6'
                ], [
                    'email.required' => 'Email is required',
                    'email.email' => 'Email is invalid',
                    'password.required' => 'Password is required',
                    'password.min' => 'Password must be at least 6 characters'
                ]);
    
                $data = $request->all();
                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                    if (Auth::user()->role == 'user' || Auth::user()->role == 'admin') {
                        Auth::logout();
                        return redirect()->back()->with('error', 'Access denied');
                    }
                    return redirect()->route('driver.dashboard');
                } else {
                    return redirect()->back()->with('error', 'Invalid email or password');
                }
            }
            return view('driver.auth.login');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect()->route('driver.login');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
