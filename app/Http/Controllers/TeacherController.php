<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Follow_course;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\Teacher;
use App\Models\Type_course;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index() {

        $id = Auth::guard('teacher')->user()->id;
        $course = Course::where('teacher_id', $id)->inRandomOrder()->get();

        // Count
        $courseCount = Course::where('teacher_id', $id)->count();
        $QuizCount = Quiz::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->count();
        $MateriCount = Materi::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->count();
        $followersCount = User::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->count();
        // Count

        // Year
        $firstCourse = Course::where('teacher_id', $id)->oldest()->first();
        $lastCourse = Course::where('teacher_id', $id)->latest()->first();
        $firstQuiz = Quiz::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->oldest()->first();
        $lastQuiz = Quiz::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->latest()->first();
        $firstMateri = Materi::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->oldest()->first();
        $lastMateri = Materi::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->latest()->first();
        $firstFollower = User::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->oldest()->first();
        $lastFollower = User::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->latest()->first();
        // Year

        return view('guru.index', compact('courseCount','QuizCount', 'followersCount', 'MateriCount', 'course', 'firstQuiz', 
        'lastQuiz', 'firstCourse', 'lastCourse', 'firstMateri', 'lastMateri', 'firstFollower', 'lastFollower'   ));
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

    public function rating() {

        $id = Auth::guard('teacher')->user()->id;

        $rate = Ulasan::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->avg('rating');

        $ulasan = Ulasan::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->inRandomOrder()->get();

        $reviewers = User::whereHas('ulasan', function ($query) use ($id) {
            $query->whereHas('course', function ($subQuery) use ($id) {
                $subQuery->where('teacher_id', $id);
            });
        })->count();
        $courseReview = Course::where('teacher_id', $id)->whereHas('ulasan')->count();

        $allRate = Ulasan::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->count();


        $rawFiveRate = Ulasan::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->where('rating', 5)->count();
        $rawFourRate = Ulasan::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->where('rating', 4)->count();
        $rawThreeRate = Ulasan::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->where('rating', 3)->count();
        $rawTwoRate = Ulasan::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->where('rating', 2)->count();
        $rawOneRate = Ulasan::whereHas('course', function ($query) use ($id) {
            $query->where('teacher_id', $id);
        })->where('rating', 1)->count();
        $fiveRate = $allRate > 0 ? ($rawFiveRate / $allRate) * 100 :0;
        $fourRate = $allRate > 0 ? ($rawFourRate / $allRate) * 100 :0;
        $threeRate = $allRate > 0 ? ($rawThreeRate / $allRate) * 100 :0;
        $twoRate = $allRate > 0 ? ($rawTwoRate / $allRate) * 100 :0;
        $oneRate = $allRate > 0 ? ($rawOneRate / $allRate) * 100 :0;

        return view('guru.rating_ulasan', compact('rate', 'reviewers', 'fiveRate', 'fourRate', 'threeRate', 'twoRate', 'oneRate', 'courseReview', 'ulasan'));
    }

    // For Edit

    public function editName(Request $request) {

        // dd($request->all());

        $request->validate([
            'name' => 'required',
        ]);

        $teacher = Teacher::where('id', $request->id)->first();
        $teacher->name = $request->name;
        $teacher->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editEmail(Request $request) {
        
        // dd($request->all());
        
        $request->validate([
            'email' => 'required',
        ]);
        
        $teacher = Teacher::where('id', $request->id)->first();

        $exist = Teacher::where('email', $request->email)->first();

        if(!$exist) {
            
            $teacher->email = $request->email;
            $teacher->save();
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
    
        $teacher = Teacher::where('id', $request->id)->first();
        $teacher->no_telepon = $request->nomor_telepon;
        $teacher->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editTl(Request $request) {
    
        // dd($request->all());
    
        $request->validate([
            'tanggal_lahir' => 'required',
        ]);
    
        $teacher = Teacher::where('id', $request->id)->first();
        $teacher->tanggal_lahir = $request->tanggal_lahir;
        $teacher->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editJk(Request $request) {
    
        // dd($request->all());
    
        $request->validate([
            'jenis_kelamin' => 'required',
        ]);
    
        $teacher = Teacher::where('id', $request->id)->first();
        $teacher->jenis_kelamin = $request->jenis_kelamin;
        $teacher->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editProfil(Request $request) {
        $request->validate([
            'profil' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Dapatkan user berdasarkan ID
        $teacher = Teacher::find($request->id);
    
        if (!$teacher) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        if ($teacher->profil) {
            $oldImagePath = public_path('Uploads/for-profil/' . $teacher->profil);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
 
        $name = time() . '.' . $request->profil->getClientOriginalExtension();
        $request->profil->move(public_path('Uploads/for-profil'), $name);
    
        // Update data profil user
        $teacher->profil = $name;
        $teacher->save();
    
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    // For Edit
}
