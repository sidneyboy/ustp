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
use App\Mail\Notify_student;
use App\Mail\Notify_chair;
use App\Mail\Complete_email;
use App\Mail\Reject_to_student;
use App\Mail\Uncomplete_email;
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

        foreach ($request->file('file') as $key => $image) {
            $imageName = time() . rand(1, 99) . '.' . $image->extension();
            $image->move(public_path('storage'), $imageName);

            $new_tor = new Tors([
                'student_id' => $new_student->id,
                'tor_image' => $imageName,
            ]);

            $new_tor->save();
        }

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
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');
        $time = date('F j, Y h:i:s a', strtotime($date));

        $code = strtoupper(uniqid());
        $new_code = new Code([
            'code' => $code,
            'status' => 'Pending',
        ]);

        $new_code->save();

        $student_email = Students::select('email')->find($request->input('student_id'));
        $chair_name = '';
        $subject = 'TOR Accreditation forwarded to USTPTrack';
        $message =  nl2br("Greetings! \n\n\nYour TOR Accreditation has been forwarded to the USTPTrack site and has been received by the corresponding program chairman/s. You may check your TOR subject accreditation status on ustptrack.com using your tracking code: (63972B5679CA3).\nYou may also access the site by clicking the link (https:ustptrack.com).\n\n\n Thank you!");
        $code = $new_code->code;

        Mail::to($student_email->email)->send(new Notify_student($subject, $message, $chair_name, $time, $code));

        for ($i = 0; $i < $request->input('number_of_subjects'); $i++) {
            $explode = explode('-', $request->input('subject_id')[$i]);
            $subject_id = $explode[0];
            $department_id = $explode[1];

            $chairman_email = User::select('email')->where('department_id', $department_id)->first();


            $new_subject_enrolled = new Subject_enrolled([
                'student_id' => $request->input('student_id'),
                'subject_id' => $subject_id,
                'grade' => $request->input('grades')[$i],
                'code' => $new_code->id,
                'department_id' => $department_id,
            ]);

            $new_subject_enrolled->save();

            $subject = "New TOR Subject Accreditation";
            Mail::to($chairman_email->email)->send(new Notify_chair($subject, $time));
        }

        return 'saved';


        //return redirect('enroll')->with('success', 'Success');
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
            ->orderBy('id','desc')
            ->get();

        return view('enrolled_students', compact('widget'), [
            'subjects' => $subjects,
        ]);
    }

    public function student_data($student_id, $code)
    {
        $user_data = User::find(auth()->user()->id);
        $student = Students::find($student_id);
        $enrolled = Subject_enrolled::where('department_id', $user_data->department_id)
            ->where('code', $code)
            ->get();
        $tor = Tors::where('student_id', $student_id)->get();
        return view('student_data', [
            'student' => $student,
            'enrolled' => $enrolled,
            'tor' => $tor,
        ]);
    }

    public function approved(Request $request)
    {
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');
        $time = date('F j, Y h:i:s a', strtotime($date));
        $user = User::find(auth()->user()->id);
        $chair_name = $user->name . " " . $user->last_name;
        $enrolled = Subject_enrolled::where('code', $request->input('code'))->first();
        $subject = 'Course Approved';
        $accredited_to = $enrolled->subject->title;
        $code = $enrolled->student_code->code;
        $status = 'approved';

        Mail::to($enrolled->student->email)->send(new Send_to_student($subject, $accredited_to, $chair_name, $code, $time, $status));

        Subject_enrolled::where('id', $request->input('id'))
            ->update([
                'status' => 'Approved',
                'accredited_to' => $request->input('accredited_to'),
                'chairman_name' => $chair_name . " " . $time,
            ]);

        $check_enrolled = Subject_enrolled::where('code', $request->input('code'))
            ->where('status', null)
            ->count();

        if ($check_enrolled == 0) {
            $subject = 'TOR Subject Accreditation';
            $check_approval = Subject_enrolled::where('code', $request->input('code'))->where('status', 'Rejected')->count();
            if ($check_approval == 0) {
                Mail::to($enrolled->student->email)->send(new Complete_email($subject, $time, $code));
            } else {
                Mail::to($enrolled->student->email)->send(new Uncomplete_email($subject, $time, $code));
            }
            $subject = 'TOR Subject Accreditation';
            Code::where('id', $request->input('code'))
                ->update(['status' => 'Completed']);
        } else {
            Code::where('id', $request->input('code'))
                ->update(['status' => 'Pending']);
        }

        return redirect()->route('student_data', ['student_id' => $enrolled->student_id, 'code' => $request->input('code')]);
    }

    public function reject($code,$id,$student_id)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');
        $time = date('F j, Y h:i:s a', strtotime($date));
        $user = User::find(auth()->user()->id);
        $chair_name = $user->name . " " . $user->last_name;
        $enrolled = Subject_enrolled::where('code', $code)->first();
        $subject = 'Course Rejected';
        $accredited_to = $enrolled->subject->title;
        $codes = $enrolled->student_code->code;
        $status = 'rejected';

        Mail::to($enrolled->student->email)->send(new Send_to_student($subject, $accredited_to, $chair_name, $codes, $time, $status));

        Subject_enrolled::where('id', $id)
            ->update([
                'status' => 'Rejected',
                'chairman_name' => $chair_name . " " . $time,
            ]);

        $check_enrolled = Subject_enrolled::where('code', $code)
            ->where('status', null)
            ->count();

        if ($check_enrolled == 0) {
            $subject = 'TOR Subject Accreditation';
            $check_approval = Subject_enrolled::where('code', $code)->where('status', 'Rejected')->count();
            if ($check_approval == 0) {
                Mail::to($enrolled->student->email)->send(new Complete_email($subject, $time, $codes));
            } else {
                Mail::to($enrolled->student->email)->send(new Uncomplete_email($subject, $time, $codes));
            }
            $subject = 'TOR Subject Accreditation';
            Code::where('id', $code)
                ->update(['status' => 'Completed']);
        } else {
            Code::where('id', $code)
                ->update(['status' => 'Pending']);
        }

        return redirect()->route('student_data', ['student_id' => $enrolled->student_id, 'code' => $code]);
    }

    public function student_data_code(Request $request)
    {
        $code = Code::select('id')->where('code', $request->input('code'))
            ->first();

        $enrolled = Subject_enrolled::where('code', $code->id)->get();

        $student = Students::find($enrolled[0]->student_id);
        $tor = Tors::where('student_id', $enrolled[0]->student_id)->get();

        return view('student_data_code', [
            'enrolled' => $enrolled,
            'student' => $student,
            'tor' => $tor,
        ]);
    }
}
