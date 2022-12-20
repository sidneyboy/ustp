@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1> --}}

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-align: center;font-weight:bold;color:#14144A">TRANSCRIPT OF RECORDS</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                Name: <span style="color:#14144A;font-weight:bold;">{{ $student->first_name }}
                                    {{ $student->middle_name }} {{ $student->last_name }}</span>
                                <br />
                                Email: <span style="color:#14144A;font-weight:bold;">{{ $student->email }}</span><br />
                                Contact Number: <span
                                    style="color:#14144A;font-weight:bold;">{{ $student->contact_number }}</span>
                            </div>
                            <div class="col-md-6">
                                Course: <span style="color:#14144A;font-weight:bold;">{{ $student->course }}</span><br />
                                Year Level: <span
                                    style="color:#14144A;font-weight:bold;">{{ $student->year_level }}</span><br />
                                Date Processed: <span
                                    style="color:#14144A;font-weight:bold;">{{ date('F j, Y h:i a', strtotime($student->date_processed)) }}</span>
                            </div>

                            <div class="col-md-12">
                                <br /><br />
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Title</th>
                                            <th>Unit</th>
                                            <th>Grade</th>
                                            <th>Department</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enrolled as $data)
                                            @if ($data->status == null)
                                                <tr>
                                                    <td class="align-middle">{{ $data->subject->course_code }}</td>
                                                    <td class="align-middle">{{ $data->subject->title }}</td>
                                                    <td class="align-middle">{{ $data->subject->units }}</td>
                                                    <td class="align-middle">{{ $data->grade }}</td>
                                                    <td class="align-middle">{{ $data->department->department }}</td>
                                                    <td>
                                                        {{-- <a href="{{ url('approved', [
                                                            'code' => $data->code,
                                                            'id' => $data->id,
                                                            'student_id' => $data->student_id,
                                                            'subject_title' => $data->subject->title,
                                                        ]) }}"
                                                            class="btn btn-primary btn-block"
                                                            style="border-radius: 30px;background:#14144A">Approved</a>
                                                        <br />
                                                        <a href="{{ url('reject', ['code' => $data->code, 'id' => $data->id, 'student_id' => $data->student_id]) }}"
                                                            class="btn btn-primary btn-block"
                                                            style="border-radius: 30px;background:#CC1332">Reject</a> --}}

                                                        <!-- Button trigger modal -->
                                                        <button type="button"
                                                            style="border-radius: 30px;background:#14144A"
                                                            class="btn btn-primary btn-block" data-toggle="modal"
                                                            data-target="#exampleModalapproved{{ $data->id }}">
                                                            Approved
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="exampleModalapproved{{ $data->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            {{ $data->subject->title }}</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{ route('approved') }}" method="post">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="">Accredited To(Subject
                                                                                    Code
                                                                                    & Descriptive Title)</label>
                                                                                <input type="text" class="form-control"
                                                                                    required name="accredited_to">

                                                                                <input type="hidden" name="code"
                                                                                    value="{{ $data->code }}">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $data->id }}">
                                                                                <input type="hidden" name="student_id"
                                                                                    value="{{ $data->student_id }}">

                                                                            
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <br />
                                                        <a href="{{ url('reject', ['code' => $data->code, 'id' => $data->id, 'student_id' => $data->student_id]) }}"
                                                            class="btn btn-primary btn-block"
                                                            style="border-radius: 30px;background:#CC1332">Reject</a>
                                                    </td>
                                                </tr>
                                            @elseif($data->status == 'Approved')
                                                <tr>
                                                    <td class="align-middle">{{ $data->subject->course_code }}</td>
                                                    <td class="align-middle">{{ $data->subject->title }}</td>
                                                    <td class="align-middle">{{ $data->subject->units }}</td>
                                                    <td class="align-middle">{{ $data->grade }}</td>
                                                    <td class="align-middle">{{ $data->department->department }}</td>
                                                    <td>
                                                        <span
                                                            style="border-radius: 30px;background:#14144A;color:white;padding:8px;">Approved</span>
                                                    </td>
                                                </tr>
                                            @elseif($data->status == 'Rejected')
                                                <tr>
                                                    <td class="align-middle">{{ $data->subject->course_code }}</td>
                                                    <td class="align-middle">{{ $data->subject->title }}</td>
                                                    <td class="align-middle">{{ $data->subject->units }}</td>
                                                    <td class="align-middle">{{ $data->grade }}</td>
                                                    <td class="align-middle">{{ $data->department->department }}</td>
                                                    <td>
                                                        <span
                                                            style="border-radius: 30px;background:#CC1332;color:white;padding:8px;">Rejected</span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-align: center;font-weight:bold;color:#14144A">TOR COPY</h3>
                    </div>
                    <div class="card-body">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                            <img src="{{ asset('/storage/' . $tor->tor_image) }}" class="img img-thumbnail"
                                style="border:0px;" alt="">
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('/storage/' . $tor->tor_image) }}" class="img img-thumbnail"
                                            style="border:0px;" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
