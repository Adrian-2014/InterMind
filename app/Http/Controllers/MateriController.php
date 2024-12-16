<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Event\Code\Test;

class MateriController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'type',
            'link',
            'document'
        ]);

        if(!$request->type) {
            return redirect()->back()->with('error', 'Mohon lengkapi data sebelum mengirim');
        }

        if($request->document) {

            $existName = Materi::where('name', $request->name)->where('course_id', $request->course_id)->first();
            if($existName) {
                return redirect()->back()->with('error', 'Nama telah digunakan, pilih nama lain!');
            }else {
                $documentPath = time(). '.'. $request->document->guessExtension();
                $request->document->move(public_path('Uploads/for-materi'), $documentPath);

                $materi = new Materi();
                $materi->name = $request->name;
                $materi->tipe = $request->type;
                $materi->course_id = $request->course_id;
                $materi->value = $documentPath;
                $materi->save();

                return redirect()->back()->with('success', 'Materi berhasil Ditambahkan');
            }

        }elseif($request->link) {
            $existName = Materi::where('name', $request->name)->where('course_id', $request->course_id)->first();
            if($existName) {
                return redirect()->back()->with('error', 'Nama telah digunakan, pilih nama lain!');
            }else {
                $materi = new Materi();
                $materi->name = $request->name;
                $materi->tipe = $request->type;
                $materi->course_id = $request->course_id;
                $materi->value = $request->link;
                $materi->save();

                return redirect()->back()->with('success', 'Materi berhasil Ditambahkan');
            }
        }
    }

    public function update(Request $request) {

        $request->validate([
            'name' => 'required',
            'type',
            'link',
            'document'
        ]);

        if(!$request->type) {
            return redirect()->back()->with('error', 'Mohon lengkapi data sebelum mengirim');
        }

        if($request->type === 'Dokumen') {

            $existName = Materi::where('name', $request->name)->where('id', '!=', $request->id)->where('course_id', $request->course_id)->first();
            if ($existName) {
                return redirect()->back()->with('error', 'Nama Course sudah digunakan, pilih nama lain!');
            } else {

                $materi = Materi::where('id', $request->id)->first();

                if ($request->hasFile('document')) { 
                    // Path gambar lama
                    $oldFilePath = public_path('Uploads/for-materi/' . $materi->dokumen);
                    // Hapus gambar lama jika file ada
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                    // Simpan gambar baru
                    $filePath = time() . '.' . $request->image->guessExtension();
                    $request->dokumen->move(public_path('Uploads/for-materi'), $filePath);
                    $materi->value = $filePath;
                }

                $materi->name = $request->name;
                $materi->tipe = $request->type;
                $materi->save();

                return redirect()->back()->with('success', 'Materi Berhasil Diperbarui!');
            }
        }elseif($request->type === 'Link') {
            $existName = Materi::where('name', $request->name)->where('id', '!=', $request->id)->where('course_id', $request->course_id)->first();
            
            if($existName) {
                return redirect()->back()->with('error', 'Nama telah digunakan, pilih nama lain!');
            }else {
                $materi = Materi::where('id', $request->id)->first();
                $materi->name = $request->name;
                $materi->tipe = $request->type;
                $materi->course_id = $request->course_id;
                $materi->value = $request->link;
                $materi->save();

                return redirect()->back()->with('success', 'Materi Berhasil Diperbarui!');
            }
        }
    }

    public function destroy(Request $request) {
        $request->validate([
            'id',
        ]);
        $materi = Materi::where('id', $request->id)->first();

        $oldFilePath = public_path('Uploads/for-materi/' . $materi->value);
        // Hapus gambar lama jika file ada
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }
        $materi->delete();
        return redirect()->back()->with('success', 'Materi berhasil Dihapus!');
    }
}
