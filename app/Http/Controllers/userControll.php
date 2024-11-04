<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userControll extends Controller
{
    public function index() {

        if(Auth::check()) {
            $auth = Auth::guard('web')->user();
            $tanggal_lahir = $auth->tanggal_lahir ? Carbon::parse($auth->tanggal_lahir)->format('j F Y') : 'Tanggal tidak tersedia';
        
            return view('welcome', compact('tanggal_lahir'));
        }else {
            return view('welcome');
        }
    }
    public function guru() {
        
        return view('guru.index');
    }





    // EDIT DATA PROFIL

    public function editName(Request $request) {

        // dd($request->all());

        $request->validate([
            'name' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();
        $user->name = $request->name;
        $user->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editEmail(Request $request) {
        
        // dd($request->all());
        
        $request->validate([
            'email' => 'required',
        ]);
        
        $user = User::where('id', $request->id)->first();

        $exist = User::where('email', $request->email)->first();

        if(!$exist) {
            
            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with('success', 'Data berhasil di Perbarui');
            
        }else {
            return redirect()->back()->with('error', 'Email telah di gunakan atau sama!');
            
        }

        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editNotelp(Request $request) {
    
        // dd($request->all());
    
        $request->validate([
            'nomor_telepon' => 'required',
        ]);
    
        $user = User::where('id', $request->id)->first();
        $user->no_telepon = $request->nomor_telepon;
        $user->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editTl(Request $request) {
    
        // dd($request->all());
    
        $request->validate([
            'tanggal_lahir' => 'required',
        ]);
    
        $user = User::where('id', $request->id)->first();
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editJk(Request $request) {
    
        // dd($request->all());
    
        $request->validate([
            'jenis_kelamin' => 'required',
        ]);
    
        $user = User::where('id', $request->id)->first();
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editProfil(Request $request) {
        $request->validate([
            'profil' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Dapatkan user berdasarkan ID
        $user = User::find($request->id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        if ($user->profil) {
            $oldImagePath = public_path('upload-profil/' . $user->profil);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
 
        $name = time() . '.' . $request->profil->getClientOriginalExtension();
        $request->profil->move(public_path('upload-profil'), $name);
    
        // Update data profil user
        $user->profil = $name;
        $user->save();
    
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    

    // EDIT DATA PROFIL
}
