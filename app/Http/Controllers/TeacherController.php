<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Follow_course;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\Type_course;
use App\Models\Ulasan;
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

    public function courseDetail($id) {

        $course = Course::where('id', $id)->first();
        $materies = Materi::where('course_id', $id)->orderBy('updated_at', 'DESC')->get();
        $quizzes = Quiz::where('course_id', $id)->orderBy('updated_at', 'DESC')->get();
        $follower = Follow_course::where('course_id', $id)->count();

        // For Rating
        $review = Ulasan::where('course_id', $id)->count();
        $rating = Ulasan::where('course_id', $id)->avg('rating');
        // For Rating
    
        return view('guru.course_detail', compact('course', 'materies', 'quizzes', 'follower', 'review', 'rating'));
        
    }

    public function answer() {

        $teacherId = Auth::guard('teacher')->user()->id;
        
        $course = Course::where('teacher_id', $teacherId)->get();
        return view('guru.answer-request', compact('course'));
    }

    public function answerVerification($id) {

        $teacherId = Auth::guard('teacher')->user()->id;
        $answer = Answer::where('id', $id)->first();
        
        return view('guru.answer-verification', compact('answer'));
        
    }
}
