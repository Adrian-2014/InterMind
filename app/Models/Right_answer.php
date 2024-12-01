<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Right_answer extends Model
{
    use HasFactory;

    protected $table = 'right_answers';

    public function answer() {
        return $this->belongsTo(Answer::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
