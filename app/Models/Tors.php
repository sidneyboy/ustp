<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tors extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'tor_image',
    ];
}
