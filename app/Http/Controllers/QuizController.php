<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'pertanyaan' => 'required',
            'gambar'
        ]);
        
        $quiz = new Quiz();

        if($request->hasFile('gambar')) {
            $imgPath = time() . '.' . $request->gambar->guessExtension();
            $request->gambar->move(public_path('Uploads/for-quiz'), $imgPath);
            $quiz->gambar = $imgPath;
        }

        $quiz->judul = $request->judul;
        $quiz->pertanyaan = $request->pertanyaan;
        $quiz->course_id = $request->course_id;
        $quiz->save();

        return redirect()->back()->with('success', 'Quiz berhasil Ditambahkan!');
    }

    public function update(Request $request) {
        $request->validate([
            'judul' => 'required',
            'pertanyaan' => 'required',
            'gambar', 
        ]);

        $quiz = Quiz::where('id', $request->id)->first();

        if ($request->hasFile('gambar') && $quiz->gambar != null) { 
            // Path gambar lama
            $oldFilePath = public_path('Uploads/for-quiz/' . $quiz->gambar);
            // Hapus gambar lama jika file ada
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
            // Simpan gambar baru
            $filePath = time() . '.' . $request->gambar->guessExtension();
            $request->gambar->move(public_path('Uploads/for-quiz'), $filePath);
            $quiz->gambar = $filePath;
        }elseif($request->hasFile('gambar') && $quiz->gambar == null) {
            // Simpan gambar baru
            $filePath = time() . '.' . $request->gambar->guessExtension();
            $request->gambar->move(public_path('Uploads/for-quiz'), $filePath);
            $quiz->gambar = $filePath;
        }

        $quiz->judul = $request->judul;
        $quiz->pertanyaan = $request->pertanyaan;
        $quiz->course_id = $request->course_id;
        $quiz->save();

        return redirect()->back()->with('success', 'Quiz berhasil Diperbarui!');
    }
    
    public function destroy(Request $request) {
        $request->validate([
            'id',
        ]);
        $quiz = Quiz::where('id', $request->id)->first();

        if($quiz->gambar) {
            $oldFilePath = public_path('Uploads/for-quiz/' . $quiz->gambar);
            // Hapus gambar lama jika file ada
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }


        $quiz->delete();
        return redirect()->back()->with('success', 'Quiz berhasil Dihapus!');
    }
}
