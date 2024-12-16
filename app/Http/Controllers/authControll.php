<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authControll extends Controller
{
    // Login

    public function loginUser(Request $request) {
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('web')->attempt($credential)) {
            return redirect()->route('index')->with('success', 'Anda berhasil Login sebagai Pelajar');
        }else {
            // dd($request);
            return redirect()->back()->with('error', 'Email dan Password tidak sesuai');
        }
    }

    public function loginGuru(Request $request) {
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('teacher')->attempt($credential)) {
            return redirect()->route('guru')->with('success', 'Anda berhasil Login sebagai Guru');
        }else {
            return redirect()->back()->with('error', 'Email dan Password tidak sesuai');
        }
    }

    // Login


    // Register

    public function daftarUser(Request $request) {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'no_telepon' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin',
            'password' => 'required',
        ]);

        if(!$request->jenis_kelamin) {
            return redirect()->back()->with('error', 'Mohon lengkapi data sebelum mengirim');
        }

        $adaUser = User::where('email', $request->email)->first();

        if(!$adaUser) {
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->no_telepon = $request->no_telepon;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::guard('web')->login($user);

            return redirect()->route('index')->with('success', 'Registrasi berhasil, anda telah login!');
        }else {
            return redirect()->back()->with('error', 'Registrasi gagal, Email telah di Gunakan!');
        }
       
    }
    
    public function daftarGuru(Request $request) {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'no_telepon' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin',
            'password' => 'required',
        ]);

        if(!$request->jenis_kelamin) {
            return redirect()->back()->with('error', 'Mohon lengkapi data sebelum mengirim');
        }

        $adaGuru = Teacher::where('email', $request->email)->first();

        if(!$adaGuru) {
            $guru = new Teacher();
            $guru->email = $request->email;
            $guru->name = $request->name;
            $guru->no_telepon = $request->no_telepon;
            $guru->tanggal_lahir = $request->tanggal_lahir;
            $guru->jenis_kelamin = $request->jenis_kelamin;
            $guru->password = Hash::make($request->password);
            $guru->save();

            Auth::guard('teacher')->login($guru);

            return redirect()->route('guru')->with('success', 'Registrasi berhasil, anda telah login!');
        }else {
            return redirect()->back()->with('error', 'Registrasi gagal, Email telah di Gunakan!');
        }
       
    }

    // Register


    // Logout

    public function logout(Request $request) {

        if(Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }elseif(Auth::guard('teacher')->check()) {
            Auth::guard('teacher')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda Berhasil Logout');

    }
}
