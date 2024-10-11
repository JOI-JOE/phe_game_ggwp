<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function infor()
    {
        $user = Auth::user();
        return view('client.account.infor', compact('user'));
    }

    public function address()
    {
        return view('client.account.address');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function postLogin(Request $request)
    {
        $user = $request->only(keys: ['email', 'password']);

        //xac thuc thong tin cua user
        if (Auth::attempt($user)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('message', 'Login false');
        }
    }

    public function postRegister(Request $request)
    {

        $rules = [
            'name' => ['required', 'min:3', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'verify_password' => ['required', 'same:password'],
            'avatar' => ['nullable', 'max:2048']
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->avatar = 'No photo';

        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('user_images', ['disk' => 'public']);
        }

        try {
            $user->save();
            return redirect()->route('account.infor');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong.'])->withInput();
        }
    }
}
