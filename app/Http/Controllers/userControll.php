<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Follow_course;
use App\Models\Materi;
use App\Models\Quiz;
use App\Models\Type_course;
use App\Models\Ulasan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userControll extends Controller
{
    public function index() {

        // For Navbar
        $type_course = Type_course::get();
        // For Navbar
        
        $courseList = Course::limit(24)->inRandomOrder()->get();
        $ulasans = Ulasan::limit(15)->inRandomOrder()->get();
       

        if(Auth::check()) {
            $auth = Auth::guard('web')->user();
            $tanggal_lahir = $auth->tanggal_lahir ? Carbon::parse($auth->tanggal_lahir)->format('j F Y') : 'Tanggal tidak tersedia';
        
            return view('welcome', compact('tanggal_lahir', 'courseList', 'type_course', 'ulasans'));
        }else {
            return view('welcome', compact('courseList', 'type_course', 'ulasans'));
        }

    }

    public function profil() {
        // For Navbar
        $type_course = Type_course::get();
        $tanggal_lahir = Auth::guard('web')->user()->tanggal_lahir ? Carbon::parse(Auth::guard('web')->user()->tanggal_lahir)->format('j F Y') : 'Tanggal tidak tersedia';
        // For Navbar 

        $id = Auth::guard('web')->user()->id;

        $myCourse = Course::whereHas('user', function($query) use ($id) {
            $query->where('user_id', $id);
        })->inRandomOrder()->get();

        $countMyQuiz = Quiz::whereHas('answer', function($query) use ($id) {
            $query->where('user_id', $id);
        })->count();

        $countMyCourse = Course::whereHas('user', function($query) use ($id) {
            $query->where('user_id', $id);
        })->count();

        return view('profil', compact('myCourse', 'countMyQuiz', 'type_course', 'tanggal_lahir', 'countMyCourse'));
    }

    public function filter($id) {

        // For Navbar
        $type_course = Type_course::get();
        // For Navbar

        $courseList = Course::where('type_id', $id)->inRandomOrder()->get();
        $typeTarget = Type_course::where('id', $id)->first();

        if(Auth::check()) {
            $auth = Auth::guard('web')->user();
            $tanggal_lahir = $auth->tanggal_lahir ? Carbon::parse($auth->tanggal_lahir)->format('j F Y') : 'Tanggal tidak tersedia';
        
            return view('filter', compact('tanggal_lahir', 'courseList', 'type_course', 'typeTarget'));
        }else {
            return view('filter', compact('courseList', 'type_course', 'typeTarget'));
        }

    }

    public function course($id) {
        // For Navbar
        $type_course = Type_course::get();
        // For Navbar

        $course = Course::where('id', $id)->first();
        $materies = Materi::where('course_id', $id)->get();
        $quizzes = Quiz::where('course_id', $id)->get();

        // For Rating
        $review = Ulasan::where('course_id', $id)->count();
        $rating = Ulasan::where('course_id', $id)->avg('rating');
        // For Rating

        if(Auth::check()) {
            $auth = Auth::guard('web')->user();
            $tanggal_lahir = $auth->tanggal_lahir ? Carbon::parse($auth->tanggal_lahir)->format('j F Y') : 'Tanggal tidak tersedia';
            
            $follow = Follow_course::where('user_id', $auth->id)->where('course_id', $id)->first();    
            
            // For Progress
            $totalQuiz = Quiz::where('course_id', $id)->count();
            $completedQuiz = Answer::whereHas('quiz', function ($query) use ($id) {
                $query->where('course_id', $id);
            })->where('user_id', $auth->id)->count();
    
            $progressPercentage = $totalQuiz > 0 ? ($completedQuiz / $totalQuiz) * 100 : 0;
            $progress = floor($progressPercentage);
            // For Progress
    
            // For Nilai
            $totalJawaban = Answer::where('user_id', $auth->id)->where('status', 'Diverifikasi')->whereHas('quiz', function($query) use ($id) {
                $query->where('course_id', $id);
            })->count();
            $jawabanBenar = Answer::where('user_id', $auth->id)->where('nilai', 'Benar')->whereHas('quiz', function($query) use ($id) {
                $query->where('course_id', $id);
            })->count();
            if($jawabanBenar === 0 || $totalJawaban === 0) {
                $nilai = 0; 
            }else {
                $nilai = ($totalJawaban / $jawabanBenar) * 100; 
            }
            // For Nilai
    
            return view('course', compact('course', 'type_course', 'tanggal_lahir', 'materies', 'quizzes', 'follow', 'review', 'rating', 'progress', 'nilai', 'jawabanBenar', 'totalJawaban'));
      
        }else {
            return view('course', compact('course', 'type_course', 'materies', 'quizzes', 'review', 'rating'));
     
        }

    }

    public function quiz($id) {

        // For Navbar
        $type_course = Type_course::get();
        $auth = Auth::guard('web')->user();
        $tanggal_lahir = $auth->tanggal_lahir ? Carbon::parse($auth->tanggal_lahir)->format('j F Y') : 'Tanggal tidak tersedia';
        // For Navbar

        $quiz = Quiz::where('id', $id)->first();
        return view('quiz', compact('type_course', 'tanggal_lahir', 'auth', 'quiz'));
    }

    // EDIT DATA PROFIL

    public function editName(Request $request) {

        // dd($request->all());

        $request->validate([
            'name' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();
        $user->name = $request->name;
        $user->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editEmail(Request $request) {
        
        // dd($request->all());
        
        $request->validate([
            'email' => 'required',
        ]);
        
        $user = User::where('id', $request->id)->first();

        $exist = User::where('email', $request->email)->first();

        if(!$exist) {
            
            $user->email = $request->email;
            $user->save();
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
    
        $user = User::where('id', $request->id)->first();
        $user->no_telepon = $request->nomor_telepon;
        $user->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editTl(Request $request) {
    
        // dd($request->all());
    
        $request->validate([
            'tanggal_lahir' => 'required',
        ]);
    
        $user = User::where('id', $request->id)->first();
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editJk(Request $request) {
    
        // dd($request->all());
    
        $request->validate([
            'jenis_kelamin' => 'required',
        ]);
    
        $user = User::where('id', $request->id)->first();
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();
        
        return redirect()->back()->with('success', 'Data berhasil di Perbarui');
        
    }
    public function editProfil(Request $request) {
        $request->validate([
            'profil' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Dapatkan user berdasarkan ID
        $user = User::find($request->id);
    
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        if ($user->profil) {
            $oldImagePath = public_path('Uploads/for-profil/' . $user->profil);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
 
        $name = time() . '.' . $request->profil->getClientOriginalExtension();
        $request->profil->move(public_path('Uploads/for-profil'), $name);
    
        // Update data profil user
        $user->profil = $name;
        $user->save();
    
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
    

    // EDIT DATA PROFIL
}
