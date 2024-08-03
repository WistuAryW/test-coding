<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'start_year',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
