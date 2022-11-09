<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'units',
        'department_id',
        'description',
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Departments', 'department_id');
    }
}
