<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'type_course' => 'required',
            'image' => 'required',
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
            $course->teacher_id = Auth::guard('teacher')->user()->id;
            $course->gambar = $imagePath;
            $course->save();

            return redirect()->back()->with('success', 'Course Berhasil Ditambahkan');
        }
    }
}
