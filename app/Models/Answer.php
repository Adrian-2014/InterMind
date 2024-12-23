<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function quiz() {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
