<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function renderRegister(Request $request) {
        return view('auth.register');
    }
    
    public function renderLogin(Request $request) {
        return view('auth.login');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
            'email' => ['required'],
            'password_confirmation' => ['required'],
        ], [
            'name.required' => "Vui lòng nhập tên tài khoản",
            'email.required' => "Vui lòng nhập email",
            'password.required' => "Vui lòng nhập mật khẩu",
            'password_confirmation.required' => "Vui lòng nhập xác nhận mật khẩu"
        ]);

        if (User::where('email', $incomingFields['email'])->first()) {
            return redirect()->back()->with('error', 'Email đã tồn tại');
        }

        // return back to the page with error password_confirmation
        if ($incomingFields['password'] != $incomingFields['password_confirmation']) {
            return redirect()->back()->with('error', 'Mật khẩu không khớp');
        }

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        // auth()->login($user);

        
        return redirect('/login');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            // 'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ] ,[
            // 'name.required' => "Vui lòng nhập tên tài khoản",
            'email.required' => "Vui lòng nhập email",
            'password.required' => "Vui lòng nhập mật khẩu"
        ]);

        if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            throw ValidationException::withMessages([
                'auth' => "Sai tài khoản hoặc mật khẩu",
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session token
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the homepage or login page
        return redirect('/');
    }
}
