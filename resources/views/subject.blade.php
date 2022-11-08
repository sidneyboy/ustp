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
            Add New Subject Data (+)
        </div>
        <div class="card-body">
            <form action="{{ route('subject_process') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label>Department</label>
                        <select name="department_id" class="form-control" required>
                            <option value="" default>Select</option>
                            @foreach ($department as $data)
                                <option value="{{ $data->id }}">{{ $data->department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Units</label>
                        <input type="number" name="units" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea name="description" class="form-control" required></textarea>
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
