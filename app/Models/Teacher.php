<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    // Tambahkan jika ada atribut khusus, seperti kolom yang bisa diisi massal
    protected $fillable = [
        'name', 'email', 'password', // sesuaikan dengan kolom yang ada di tabel 'teachers'
    ];

    // Pastikan password di-hash
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }
}
