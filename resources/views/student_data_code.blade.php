<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Student Enrolled Subjects</title>
</head>

<body>  
          <br />
    <div class="row">
        <div class="col-md-12">
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
                                                                    
                                                                    <span style="border-radius: 30px;background:#FBB313;color:white;padding:8px;">No Verdict Yet</span>
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
                                                                    <span style="border-radius: 30px;background:#14144A;color:white;padding:8px;">Approved</span>
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
                                                                   <span style="border-radius: 30px;background:#CC1332;color:white;padding:8px;">Rejected</span>
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
                                    <img src="{{ asset('/storage/' . $tor->tor_image) }}" class="img img-thumbnail" style="border:0px;"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
