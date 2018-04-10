<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function password()
    {
        return view('account.password');
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();

        if (! Hash::check($request->get('current_password'), $user->magic_words)) {
            return redirect()->back()->withErrors([
                'current_password' => 'The current password is not valid'
            ]);
        }

        $this->validate($request, [
            'password' => 'required|confirmed', 
            'password_confirmation' => 'required'
        ]);

        $user->magic_words = bcrypt($request->get('password'));
        $user->save();

        return redirect('account')
            ->with('alert', 'Your password has been changed');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('account.edit-profile', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $this->validate($request, ['name' => 'required|min:2']);

        $user = $request->user();

        $user->fill($request->only(['name']));
        $user->save();

        return redirect('account')
            ->with('alert', 'Your name has been edited');
    }
}
