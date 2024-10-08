<?php

namespace App\Http\Controllers;

use App\Rules\ConfirmPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'existing_password' => ['required', new ConfirmPassword()],
        ]);

        if (Hash::check($request->existing_password, DB::table('settings')->orderBy('id', 'desc')->first()->password)) {
            DB::table('settings')
                ->where('id', 1)
                ->update([
                    'password' => Hash::make($request->get('password')),
                ]);

            return view('success', ['message' => 'Your password has been updated!']);
        }

        return back()->withErrors(['error' => 'Password Not Updated!']);
    }
}
