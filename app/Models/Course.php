<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'modules';

    public function teacher() {
        return $this->blongsTo(Teacher::class);
    }

    public function type() {
        return $this->belongsTo(Type_course::class);
    }
}
