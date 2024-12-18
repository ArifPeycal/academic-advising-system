<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'course_code'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'course_code',
        'name',
        'credit_hour',
        'classification',
        'prerequisite',
        'description',
    ];
}
