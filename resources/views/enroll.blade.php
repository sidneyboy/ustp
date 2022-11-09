@extends('layouts.secret')

@section('main-content')
    {{-- <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1> --}}

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
        <div class="card-header">Enroll Student</div>
        <div class="card-body">
            <form id="enroll_proceed">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Student</label>
                        <select name="student_id" class="form-control" required>
                            <option value="" default>Select</option>
                            @foreach ($student as $data)
                                <option value="{{ $data->id }}">
                                    {{ $data->last_name . ', ' . $data->first_name . ' ' . $data->middle_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Number of Subjects</label>
                        <input type="number" class="form-control" name="number_of_subjects" required>
                    </div>
                    <div class="col-md-12">
                        <br />
                        <button type="submit" class="btn btn-sm btn-primary float-right">enroll_Proceed</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div id="enroll_proceed_page"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $("#enroll_proceed").on('submit', (function(e) {
            e.preventDefault();
            //$('.loading').show();
            $.ajax({
                url: "enroll_proceed",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('.loading').hide();
                    $('#enroll_proceed_page').html(data);
                },
            });
        }));
    </script>
@endsection
