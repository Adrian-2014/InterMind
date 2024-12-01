<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function answer() {
        return $this->hasMany(Answer::class);
    }

    public function right_answer() {
        return $this->hasOne(Right_answer::class);
    }
}
