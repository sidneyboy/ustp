<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject_enrolled extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'status',
        'grade',
        'code',
        'department_id',
        'accredited_to',
        'chairman_name',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Students', 'student_id');
    }

    public function student_code()
    {
        return $this->belongsTo('App\Models\Code', 'code');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Departments', 'department_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subjects', 'subject_id');
    }

    public function code_status()
    {
        return $this->belongsTo('App\Models\Code', 'code');
    }
}
