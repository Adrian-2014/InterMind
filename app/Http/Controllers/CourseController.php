<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function store(Request $request) {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'type_course' => 'required',
            'image' => 'required',
            'deskripsi' => 'required',
        ]);

        $existName = Course::where('name', $request->name)->first();

        if($existName) {
            return redirect()->back()->with('error', 'Nama Course telah digunakan, pilih nama lain!');
        }else {
            $imagePath = time(). '.'. $request->image->guessExtension();
            $request->image->move(public_path('Uploads/for-course'), $imagePath);

            $course = new Course();
            $course->name = $request->name;
            $course->type_id = $request->type_course;
            $course->deskripsi = $request->deskripsi;
            $course->teacher_id = Auth::guard('teacher')->user()->id;
            $course->gambar = $imagePath;
            $course->save();

            return redirect()->back()->with('success', 'Course berhasil Ditambahkan!');
        }
    }

    public function update(Request $request) {

        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'type_course' => 'required',
            'deskripsi' => 'required',
        ]);

        // Cek apakah nama tipe course sudah ada selain yang sedang diupdate
        $existName = Course::where('name', $request->name)
            ->where('id', '!=', $request->id)->first();

            if ($existName) {
                return redirect()->back()->with('error', 'Nama Course sudah digunakan, pilih nama lain!');
            } else {

            $course = Course::where('id', $request->id)->first();
            // Proses update gambar jika ada gambar baru
            if ($request->hasFile('image')) {
                // Path gambar lama
                $oldImagePath = public_path('Uploads/for-course/' . $course->gambar);
                // Hapus gambar lama jika file ada
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Simpan gambar baru
                $imagePath = time() . '.' . $request->image->guessExtension();
                $request->image->move(public_path('Uploads/for-course'), $imagePath);

                // Update path gambar pada model
                $course->gambar = $imagePath;
            }
            $course->name = $request->name;
            $course->type_id = $request->type_course;
            $course->deskripsi = $request->deskripsi;
            $course->save();

            return redirect()->back()->with('success', 'Course berhasil Diperbarui!');
        }
    }


    public function destroy(Request $request) {
        $request->validate([
            'id',
        ]);
        $course = Course::where('id', $request->id)->first();

        $oldImagePath = public_path('Uploads/for-course/' . $course->gambar);
        // Hapus gambar lama jika file ada
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        $course->delete();
        return redirect()->back()->with('success', 'Course berhasil Dihapus!');

     
    }
}
