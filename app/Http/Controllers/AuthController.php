<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function cek_login(Request $request)
    {

        $this->validate($request, [

            'username' => ['required'],
            'password' => ['required', 'min:8']
        ]);

        if (!auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back();
        }
        return redirect()->route('home')->with('suksess_masuk', '');
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    public function cek_registrasi(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255', 'min:4'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        auth()->LoginUsingId($user->id);
        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
