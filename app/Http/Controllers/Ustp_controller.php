<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Students;
use App\Models\User;
use App\Models\Tors;
use App\Models\Subjects;
use App\Models\Code;
use App\Models\Subject_enrolled;
use App\Mail\Send_to_student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        $new_student = new Students([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'course' => $request->input('course'),
            'year_level' => $request->input('year_level'),
            'date_processed' => $date,
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
            'course_code' => $request->input('course_code'),
        ]);

        $new->save();

        return redirect('subject')->with('success', 'Success');
    }

    public function enroll()
    {
        $student = Students::get();
        return view('enroll', [
            'student' => $student,
        ]);
    }

    public function enroll_proceed(Request $request)
    {
        $student = Students::find($request->input('student_id'));
        $subjects = Subjects::get();
        return view('enroll_proceed', [
            'student' => $student,
            'subjects' => $subjects,
        ])->with('student_id', $request->input('student_id'))
            ->with('number_of_subjects', $request->input('number_of_subjects'));
    }

    public function enroll_process(Request $request)
    {
        //return $request->input();
        $code = strtoupper(uniqid());
        $new_code = new Code([
            'code' => $code,
        ]);

        $new_code->save();


        for ($i = 0; $i < $request->input('number_of_subjects'); $i++) {
            $explode = explode('-', $request->input('subject_id')[$i]);
            $subject_id = $explode[0];
            $department_id = $explode[1];
            $new_subject_enrolled = new Subject_enrolled([
                'student_id' => $request->input('student_id'),
                'subject_id' => $subject_id,
                'grade' => $request->input('grades')[$i],
                'code' => $new_code->id,
                'department_id' => $department_id,
            ]);

            $new_subject_enrolled->save();
        }

        return redirect('enroll')->with('success', 'Success');
    }

    public function chair_register()
    {
        $departments = Departments::get();
        return view('chair_register', [
            'departments' => $departments,
        ]);
    }

    public function ustp_login(Request $request)
    {
        // return $request->input();

        if (Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect('home');
        } else {
            return redirect('/');
        }
    }

    public function enrolled_students()
    {
        //return 'asdasd';
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $user_data = User::find(auth()->user()->id);
        $subjects = Subject_enrolled::where('department_id', $user_data->department_id)
            ->groupBy('code')
            ->get();

        return view('enrolled_students', compact('widget'), [
            'subjects' => $subjects,
        ]);
    }

    public function student_data($student_id, $code)
    {
        $student = Students::find($student_id);
        $enrolled = Subject_enrolled::where('code', $code)->get();
        $tor = Tors::where('student_id', $student_id)->first();
        return view('student_data', [
            'student' => $student,
            'enrolled' => $enrolled,
            'tor' => $tor,
        ]);
    }

    public function approved($code, $id)
    {
        $enrolled = Subject_enrolled::where('code', $code)->first();
        $subject = 'Course Approved';
        $message = $enrolled->subject->title . ' has been approved please check your enrollment status at USTPtrack.com using this code ' . $enrolled->student_code->code;
        Mail::to($enrolled->student->email)->send(new Send_to_student($subject, $message));

        Subject_enrolled::where('id', $id)
            ->update(['status' => 'Approved']);

        return redirect()->route('student_data', ['student_id' => $enrolled->student_id, 'code' => $code]);
    }

    public function reject($code, $id)
    {
        $enrolled = Subject_enrolled::where('code', $code)->first();
        $subject = 'Course Rejected';
        $message = $enrolled->subject->title . ' has been rejected please check your enrollment status at USTPtrack.com using this code ' . $enrolled->student_code->code;
        Mail::to($enrolled->student->email)->send(new Send_to_student($subject, $message));

        Subject_enrolled::where('id', $id)
            ->update(['status' => 'Rejected']);

        return redirect()->route('student_data', ['student_id' => $enrolled->student_id, 'code' => $code]);
    }

    public function student_data_code(Request $request)
    {
        $code = Code::select('id')->where('code',$request->input('code'))
                            ->first();

        $enrolled = Subject_enrolled::where('code',$code->id)->get();
        
        $student = Students::find($enrolled[0]->student_id);
        $tor = Tors::where('student_id', $enrolled[0]->student_id)->first();

        return view('student_data_code',[
            'enrolled' => $enrolled,
            'student' => $student,
            'tor' => $tor,
        ]);
    }
}
