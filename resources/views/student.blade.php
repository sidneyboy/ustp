@extends('layouts.secret')

@section('main-content')
    <!-- Page Heading -->


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

    <div class="card">
        <div class="card-header">
            Add New Student Data (+)
        </div>
        <div class="card-body">
            <form action="{{ route('student_process') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Middle Name</label>
                        <input type="text" name="middle_name" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Contact Number</label>
                        <input type="number" name="contact_number" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Course</label>
                        <input type="text" name="course" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Year Level</label>
                        <input type="text" name="year_level" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="col-md-6">
                        <label>Transcript of Records Image</label>
                        <input type="file" class="form-control" multiple name="file[]" required>
                    </div>
                    <div class="col-md-12">
                        <br />
                        <button type="submit" class="btn btn-sm btn-primary float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
