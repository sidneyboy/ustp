<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Students;
use App\Models\Tors;
use App\Models\Subjects;
use Illuminate\Http\Request;

class Ustp_controller extends Controller
{
    public function secret()
    {
        return view('secret');
    }

    public function department()
    {
        $department = Departments::get();
        return view('department', [
            'department' => $department
        ]);
    }

    public function department_process(Request $request)
    {
        //return $request->input();

        $new = new Departments([
            'department' => $request->input('department'),
        ]);

        $new->save();

        return redirect('department')->with('success', 'Success');
    }

    public function department_update_process(Request $request)
    {
        Departments::where('id', $request->input('department_id'))
            ->update(['department' => $request->input('update_department')]);

        return redirect('department')->with('success', 'Update Success');
    }

    public function student()
    {
        return view('student');
    }

    public function student_process(Request $request)
    {
        $new_student = new Students([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);

        $new_student->save();

        $file = $request->file('file');
        $file_name = 'file-' . time() . '.' . $file->getClientOriginalExtension();
        $path_file = $file->storeAs('public', $file_name);

        $new_tor = new Tors([
            'student_id' => $new_student->id,
            'tor_image' => $file_name,
        ]);

        $new_tor->save();

        return redirect('student')->with('success', 'Success');
    }

    public function subject()
    {
        $department = Departments::get();
        return view('subject', [
            'department' => $department,
        ]);
    }

    public function subject_process(Request $request)
    {
        //return $request->input();

        $new = new Subjects([
            'title' => $request->input('title'),
            'units' => $request->input('units'),
            'department_id' => $request->input('department_id'),
            'description' => $request->input('description'),
        ]);

        $new->save();

        return redirect('student')->with('success', 'Success');
    }
}
