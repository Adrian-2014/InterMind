<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_course extends Model
{
    use HasFactory;

    public function courses() {
        return $this->hasMany(Course::class);
    }
}
