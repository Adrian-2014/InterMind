<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'quiz_id',
            'answer',
            'file',
        ]);

        $answer = new Answer();
        $answer->quiz_id = $request->quiz_id;
        $answer->user_id = Auth::guard('web')->user()->id;
        $answer->jawaban = $request->answer;
        $answer->status = 'Proses Validasi';

        if($request->file) {
            $filePath = time(). '.' . $request->file->guessExtension();
            $request->file->move(public_path('Uploads/for-answer'), $filePath);
            $answer->file = $filePath;
        }

        $answer->save();

        return redirect("/course/" . $request->course_id)->with('success', 'Anda telah menyelesaikan sebuah Quiz!');
    }

    public function rightAnswer(Request $request) {

        $request->validate([
            'id',
        ]);

        $answer = Answer::where('id', $request->id)->first();
        $answer->nilai = 'Benar';
        $answer->status = 'Diverifikasi';
        $answer->save();

        return redirect('/guru-answer_request')->with('success', 'Verifikasi berhasil di kirim!');
    }

    public function wrongAnswer(Request $request) {

        $request->validate([
            'id',
        ]);

        $answer = Answer::where('id', $request->id)->first();
        $answer->nilai = 'Salah';
        $answer->status = 'Diverifikasi';
        $answer->save();

        return redirect('/guru-answer_request')->with('success', 'Verifikasi berhasil di kirim!');
    }
}
