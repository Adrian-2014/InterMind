<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function penilaian() {
        return $this->hasMany(Penilaian::class);
    }
}
