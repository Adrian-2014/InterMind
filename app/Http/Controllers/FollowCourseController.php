<?php

namespace App\Http\Controllers;

use App\Models\Follow_course;
use Illuminate\Http\Request;

class FollowCourseController extends Controller
{
    public function follow(Request $request) {
        $request->validate([
            'user_id',
            'course_id'
        ]);

        $follow = new Follow_course();
        $follow->user_id = $request->user_id;
        $follow->course_id = $request->course_id;
        $follow->save();

        return redirect()->back()->with('success', 'Course berhasil diikuti!');
    }

    public function cancel(Request $request) {
        $request->validate([
            'user_id',
            'course_id'
        ]);

        $follow = Follow_course::where('user_id', $request->user_id)->where('course_id', $request->course_id)->first();
        $follow->delete();

        return redirect()->back()->with('success', 'Course batal diikuti!');
    }
}
