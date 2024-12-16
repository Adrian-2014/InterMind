<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function type_course() {
        return $this->belongsTo(Type_course::class, 'type_id');
    }

    public function materi() {
        return $this->hasMany(Materi::class);
    }
    
    public function quiz() {
        return $this->hasMany(Quiz::class);
    }

    public function penilaian() {
        return $this->hasMany(Penilaian::class);
    }
    
    public function ulasan() {
        return $this->hasMany(Ulasan::class);
    }

    public function user() {
        return $this->belongsToMany(User::class, 'follow_courses');
    }
}
