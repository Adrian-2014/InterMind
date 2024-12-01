<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Type_course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index() {
        return view('guru.index');
    }

    public function course() {

        $type_course = Type_course::get();

        $myCourse = Course::where('teacher_id', Auth::guard('teacher')->user()->id)->orderBy('updated_at', 'DESC')->get();

        return view ('guru.course', compact('type_course', 'myCourse'));
    }
}
