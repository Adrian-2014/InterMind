<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function post(Request $request) {
        $request->validate([
            'rating',
            'ulasan'
        ]);

        if(!$request->rating || !$request->ulasan) {
            return redirect()->back()->with('error', 'Mohon lengkapi data sebelum mengirim');
        }

        $ulasanExist = Ulasan::where('user_id', $request->user_id)->first();
        
        if($ulasanExist) {
            $ulasan = Ulasan::where('user_id', $request->user_id)->first();
            $ulasan->ulasan = $request->ulasan;
            $ulasan->rating = $request->rating;
            $ulasan->user_id = $request->user_id;
            $ulasan->course_id = $request->course_id;
            $ulasan->save();
        }else {
            $ulasan = new Ulasan();
            $ulasan->ulasan = $request->ulasan;
            $ulasan->rating = $request->rating;
            $ulasan->user_id = $request->user_id;
            $ulasan->course_id = $request->course_id;
            $ulasan->save();
        }

        return redirect()->back()->with('success', 'Ulasan berhasil Diposting!');

    }
}
