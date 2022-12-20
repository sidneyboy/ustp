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


    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px;">
            <div class="card">
                <div class="card-header" style="font-weight: bold;">For Accreditation</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($subjects as $data)
                            @if ($data->code_status->status == 'Pending')
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header"
                                            style="text-transform: uppercase;text-align:center;color:#14144A;font-weight:bold;">
                                            {{ $data->student->first_name }} {{ $data->student->middle_name }}
                                            {{ $data->student->last_name }}
                                        </div>
                                        <div class="card-body">
                                            <h6>Course: {{ $data->student->course }}</h6>
                                            <h6>Contact Number: {{ $data->student->contact_number }}</h6>
                                            <h6>Year Level: {{ $data->student->year_level }}</h6>
                                            <h6>Accreditation: <span
                                                    class="badge badge-warning">{{ $data->code_status->status }}</span></h6>
                                            <h6>Date Enrolled: {{ date('F j, Y', strtotime($data->created_at)) }}</h6>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ url('student_data', [
                                                'student_id' => $data->student_id,
                                                'code' => $data->code,
                                            ]) }}"
                                                class="btn btn-sm btn-block
                            btn-primary"
                                                style="border-radius: 30px;background:#14144A;">View</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-weight: bold;">Completed Accreditation</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($subjects as $data)
                            @if ($data->code_status->status == 'Completed')
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header"
                                            style="text-transform: uppercase;text-align:center;color:#14144A;font-weight:bold;">
                                            {{ $data->student->first_name }} {{ $data->student->middle_name }}
                                            {{ $data->student->last_name }}
                                        </div>
                                        <div class="card-body">
                                            <h6>Course: {{ $data->student->course }}</h6>
                                            <h6>Contact Number: {{ $data->student->contact_number }}</h6>
                                            <h6>Year Level: {{ $data->student->year_level }}</h6>
                                            <h6>Accreditation: <span
                                                    class="badge badge-success">{{ $data->code_status->status }}</span>
                                            </h6>
                                            <h6>Date Enrolled: {{ date('F j, Y', strtotime($data->created_at)) }}</h6>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ url('student_data', [
                                                'student_id' => $data->student_id,
                                                'code' => $data->code,
                                            ]) }}"
                                                class="btn btn-sm btn-block
                            btn-primary"
                                                style="border-radius: 30px;background:#14144A;">View</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
