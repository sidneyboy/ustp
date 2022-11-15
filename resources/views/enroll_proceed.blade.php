<h4>{{ $student->last_name . ', ' . $student->first_name . ' ' . $student->middle_name }}</h4>

<form action="{{ route('enroll_process') }}" method="post">
    @csrf
    <div class="row">
        @for ($i = 0; $i < $number_of_subjects; $i++)
            <div class="col-md-6">
                <label>Subject # {{ $i + 1 }} </label>
                <select name="subject_id[]" class="form-control" required>
                    <option value="" default>Select</option>
                    @foreach ($subjects as $data)
                        <option value="{{ $data->id }}">{{ $data->title . ' - ' . $data->department->department }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>Subject Grade</label>
                <input type="text" class="form-control" required name="grades[]" required>
            </div>
        @endfor

        <div class="col-md-12">
            <br />
            <input type="hidden" name="number_of_subjects" value="{{ $number_of_subjects }}">
            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <button class="btn btn-sm btn-primary float-right">Submit</button>
        </div>
    </div>
</form>
