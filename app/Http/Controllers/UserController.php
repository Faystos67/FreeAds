<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:20|min:3|unique:users',
            'email' => 'required|string|email|max:30|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'active' => 0

        ]);
        $to_name = $request->username;
        $to_email = $request->email;
        $data = array('name' => $to_name, "body" => "Bienvenue sur FreeAds!\n Merci de confirmer votre inscription en cliquant sur le lien ci-dessous:");
        Mail::send('emails', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('FreeAds Testing Mail');
            $message->from('f.allouache67@gmail.com', 'FreeAds Web');
        });
        return redirect()->to('/login');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {

                $logindata = $request->only('email', 'password');
                if (Auth::attempt($logindata)) {
                    $request->session()->regenerate();
                    return redirect()->to('/');
                }
                return back()->withErrors([
                    'email' => "Cette adresse mail n'existe pas",
                ]);

    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect()->to('/');
    }

    public function profile()
    {
        return view('profil');
    }

    public function passwordUpdate(Request $request)
    {
        //$passwordData = Auth::user()->getAuthPassword();
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
            'new_confirm_password' => ['required', 'same:new_password'],
        ]);

        $user = auth()->user();
        if (!Hash::check($request['current_password'], $user->getAuthPassword())) {
            return back()->withErrors(['current_password' => 'Ton mot de passe est incorrect']);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success.message', 'Mot de passe modifié');

    }

    public function infoUpdate()
    {
        $user = auth()->user();
        $infos = request()->validate([
            'email' => 'required|string|email|max:30|unique:users',
            'address' => 'required|string|max:30',
            'city' => 'required|string|max:20'
        ]);

        $user->update($infos);
        return back()->with('success.message', 'Les informations ont été modifiées');
    }
}
