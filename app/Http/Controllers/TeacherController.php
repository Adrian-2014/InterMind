<?php

namespace App\Http\Controllers;

use App\Models\Type_course;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index() {
        return view('guru.index');
    }

    public function course() {

        $type_course = Type_course::get();

        return view ('guru.course', compact('type_course'));
    }
}
