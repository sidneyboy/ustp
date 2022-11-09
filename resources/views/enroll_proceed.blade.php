<h4>{{ $student->last_name . ', ' . $student->first_name . ' ' . $student->middle_name }}</h4>

<div class="row">
    @for ($i = 0; $i < $number_of_subjects; $i++)
        <div class="col-md-6">
            <label>Subject # {{ $i + 1 }} </label>
            <select name="subject_id[]" class="form-control" required>
                <option value="" default>Select</option>
                @foreach ($subjects as $data)
                    <option value="{{ $data->id }}">{{ $data->title ." - ". $data->department->department }}</option>
                @endforeach
            </select>
        </div>
    @endfor
</div>
