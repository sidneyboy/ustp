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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8" id="exportContent">
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
                                        Email: <span
                                            style="color:#14144A;font-weight:bold;">{{ $student->email }}</span><br />
                                        Contact Number: <span
                                            style="color:#14144A;font-weight:bold;">{{ $student->contact_number }}</span>
                                    </div>
                                    <div class="col-md-6">
                                        Course: <span
                                            style="color:#14144A;font-weight:bold;">{{ $student->course }}</span><br />
                                        Year Level: <span
                                            style="color:#14144A;font-weight:bold;">{{ $student->year_level }}</span><br />
                                        Date Processed: <span
                                            style="color:#14144A;font-weight:bold;">{{ date('F j, Y h:i a', strtotime($student->date_processed)) }}</span>
                                    </div>

                                    <div class="col-md-12">
                                        <br /><br />
                                        <div class="table table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Subject Code</th>
                                                        <th>Descriptive Title</th>
                                                        <th>Unit</th>
                                                        <th>Accredited To</th>
                                                        <th>Chairman Name</th>
                                                        <th>Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($enrolled as $data)
                                                        @if ($data->status == null)
                                                            <tr>
                                                                
                                                                <td class="align-middle">
                                                                    {{ $data->subject->course_code }}</td>
                                                                <td class="align-middle">{{ $data->subject->title }}
                                                                </td>
                                                                <td class="align-middle">{{ $data->subject->units }}
                                                                </td>
                                                                <td>{{ $data->accredited_to }}</td>
                                                                <td>{{ Str::ucfirst($data->chairman_name) }}</td>
                                                                <td>

                                                                    <span
                                                                        style="border-radius: 30px;background:#FBB313;color:white;padding:8px;">Pending</span>
                                                                </td>
                                                            </tr>
                                                        @elseif($data->status == 'Approved')
                                                            <tr>
                                                                <td>{{ $data->id }}</td>
                                                                <td class="align-middle">
                                                                    {{ $data->subject->course_code }}</td>
                                                                <td class="align-middle">{{ $data->subject->title }}
                                                                </td>
                                                                <td class="align-middle">{{ $data->subject->units }}
                                                                </td>

                                                                <td>{{ $data->accredited_to }}</td>
                                                                <td>{{ Str::ucfirst($data->chairman_name) }}</td>
                                                                <td>
                                                                    <span
                                                                        style="border-radius: 30px;background:#14144A;color:white;padding:8px;">Approved</span>
                                                                </td>
                                                            </tr>
                                                        @elseif($data->status == 'Rejected')
                                                            <tr>
                                                                <td>{{ $data->id }}</td>
                                                                <td class="align-middle">
                                                                    {{ $data->subject->course_code }}</td>
                                                                <td class="align-middle">{{ $data->subject->title }}
                                                                </td>
                                                                <td class="align-middle">{{ $data->subject->units }}
                                                                </td>
                                                                <td>{{ $data->accredited_to }}</td>
                                                                <td>{{ Str::ucfirst($data->chairman_name) }}</td>
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
                            <div class="card-footer">
                                <button onclick="Export2Word('exportContent');" class="btn btn-success btn-sm float-right">Export as .doc</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="text-align: center;font-weight:bold;color:#14144A">TOR COPY</h3>
                            </div>
                            <div class="card-body">
                                <img src="{{ asset('/storage/' . $tor->tor_image) }}" class="img img-thumbnail"
                                    style="border:0px;" alt="">
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
    <script>
        function Export2Word(element, filename = '') {
            var preHtml =
                "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
            var postHtml = "</body></html>";
            var html = preHtml + document.getElementById(element).innerHTML + postHtml;

            var blob = new Blob(['\ufeff', html], {
                type: 'application/msword'
            });

            // Specify link url
            var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

            // Specify file name
            filename = filename ? filename + '.doc' : 'document.doc';

            // Create download link element
            var downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = url;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }

            document.body.removeChild(downloadLink);
        }
    </script>
</body>

</html>
