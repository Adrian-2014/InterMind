<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    public function course() {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function answer() {
        return $this->hasMany(Answer::class);
    }

    public function penilaian() {
        return $this->hasMany(Penilaian::class);
    }
}
