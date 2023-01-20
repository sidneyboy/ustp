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
            <a href="{{ url('/') }}" style="margin-left:10px;">Back To Home Page</a>
        </div>
        <br />
        <div class="col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 style="text-align: center;font-weight:bold;color:#14144A">TRANSCRIPT OF RECORDS</h3>
                            </div>
                            <div class="card-body">
                                <div id="exportContent">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                Office of the University Registrar</p>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                University of Science and Technology of Southern Philippines</p>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                Cagayan de Oro City, 9000 Philippines</p>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                <br>&nbsp;<br><strong>APPLICATION FOR ACCREDITATION OF SUBJECTS</strong>
                                            </p>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                <strong>TAKEN IN OTHER COLLEGES/UNIVERSITIES</strong>
                                            </p>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                <strong>(College Level)</strong>
                                            </p>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                <strong>&nbsp;</strong>
                                            </p>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                <span style="color:black;">&nbsp;</span>
                                            </p>
                                            <center>
                                                <table style="width: 100%;border-collapse:collapse;border:none;">
                                                    <thead>
                                                        <tr>
                                                            <td
                                                                style="width: 87.75pt;border: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:right;border:none;'>
                                                                    Name:</p>
                                                            </td>
                                                            <td
                                                                style="width: 146.25pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                    <strong><span
                                                                            style="color:#14144A;">{{ $student->first_name }}
                                                                            {{ $student->last_name }}</span></strong>
                                                                </p>
                                                            </td>
                                                            <td
                                                                style="width: 1.25in;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:right;border:none;'>
                                                                    Course:</p>
                                                            </td>
                                                            <td
                                                                style="width: 145.5pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                    <strong><span
                                                                            style="color:#14144A;">{{ $student->course }}</span></strong>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="width: 87.75pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:right;border:none;'>
                                                                    Email:</p>
                                                            </td>
                                                            <td
                                                                style="width: 146.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                    <strong><span
                                                                            style="color:#14144A;">{{ $student->email }}</span></strong>
                                                                </p>
                                                            </td>
                                                            <td
                                                                style="width: 1.25in;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:right;border:none;'>
                                                                    Year Level:</p>
                                                            </td>
                                                            <td
                                                                style="width: 145.5pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                    <strong><span
                                                                            style="color:#14144A;">{{ $student->year_level }}</span></strong>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td
                                                                style="width: 87.75pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;white-space:nowrap;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:right;border:none;'>
                                                                    Contact Number:</p>
                                                            </td>
                                                            <td
                                                                style="width: 146.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                    <strong><span
                                                                            style="color:#14144A;">{{ $student->contact_number }}</span></strong>
                                                                </p>
                                                            </td>
                                                            <td
                                                                style="width: 1.25in;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:right;border:none;'>
                                                                    Date Processed:</p>
                                                            </td>
                                                            <td
                                                                style="width: 145.5pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                    <strong><span
                                                                            style="color:#14144A;">{{ date('F j, Y h:i a', strtotime($student->date_processed)) }}</span></strong>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </center>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                <strong><span style="color:#14144A;">&nbsp;</span></strong>
                                            </p>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                <strong><span style="color:#14144A;">&nbsp;</span></strong>
                                            </p>
                                            <p
                                                style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                <strong><span style="color:#14144A;">&nbsp;</span></strong>
                                            </p>
                                            <center>
                                                <table style="width: 100%;border-collapse:collapse;border:none;">
                                                    <thead>
                                                        <tr>
                                                            <td
                                                                style="width: 79.5pt;border: 1pt solid black;padding: 0in;height: 19.5pt;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                    <strong>Subject Code</strong>
                                                                </p>
                                                            </td>
                                                            <td
                                                                style="width: 107.25pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0in;height: 19.5pt;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                    <strong>Descriptive Title</strong>
                                                                </p>
                                                            </td>
                                                            <td
                                                                style="width: 34.5pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0in;height: 19.5pt;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                    <strong>Unit</strong>
                                                                </p>
                                                            </td>
                                                            <td
                                                                style="width: 81pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0in;height: 19.5pt;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                    <strong>Accredited To</strong>
                                                                </p>
                                                            </td>
                                                            <td
                                                                style="width: 89.25pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0in;height: 19.5pt;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                    <strong>Chairman Name</strong>
                                                                </p>
                                                            </td>
                                                            <td
                                                                style="width: 77.25pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0in;height: 19.5pt;vertical-align: top;">
                                                                <p
                                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                    <strong>Remarks</strong>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($enrolled as $data)
                                                            @if ($data->status == null)
                                                                <tr>
                                                                    <td
                                                                        style="width: 79.5pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                            {{ $data->subject->course_code }}</p>
                                                                    </td>
                                                                    <td
                                                                        style="width: 107.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                            {{ $data->subject->title }}</p>

                                                                    </td>
                                                                    <td
                                                                        style="width: 34.5pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            {{ $data->subject->units }}</p>

                                                                    </td>
                                                                    <td
                                                                        style="width: 81pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            {{ $data->accredited_to }}</p>
                                                                    </td>
                                                                    <td
                                                                        style="width: 89.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            {{ Str::ucfirst($data->chairman_name) }}
                                                                        </p>
                                                                    </td>
                                                                    <td
                                                                        style="width: 77.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            <span
                                                                                style="color:white;background:#14144A;">Pending</span>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            @elseif($data->status == 'Approved')
                                                                <tr>
                                                                    <td
                                                                        style="width: 79.5pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                            {{ $data->subject->course_code }}</p>
                                                                    </td>
                                                                    <td
                                                                        style="width: 107.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                            {{ $data->subject->title }}</p>

                                                                    </td>
                                                                    <td
                                                                        style="width: 34.5pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            {{ $data->subject->units }}</p>

                                                                    </td>
                                                                    <td
                                                                        style="width: 81pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            {{ $data->accredited_to }}</p>
                                                                    </td>
                                                                    <td
                                                                        style="width: 89.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            {{ Str::ucfirst($data->chairman_name) }}
                                                                        </p>
                                                                    </td>
                                                                    <td
                                                                        style="width: 77.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            <span
                                                                                style="color:white;background:#14144A;">Approved</span>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            @elseif($data->status == 'Rejected')
                                                                <tr>
                                                                    <td
                                                                        style="width: 79.5pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                            {{ $data->subject->course_code }}</p>
                                                                    </td>
                                                                    <td
                                                                        style="width: 107.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;border:none;'>
                                                                            {{ $data->subject->title }}</p>

                                                                    </td>
                                                                    <td
                                                                        style="width: 34.5pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            {{ $data->subject->units }}</p>

                                                                    </td>
                                                                    <td
                                                                        style="width: 81pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            {{ $data->accredited_to }}</p>
                                                                    </td>
                                                                    <td
                                                                        style="width: 89.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            {{ Str::ucfirst($data->chairman_name) }}
                                                                        </p>
                                                                    </td>
                                                                    <td
                                                                        style="width: 77.25pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0in;vertical-align: top;">
                                                                        <p
                                                                            style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:center;border:none;'>
                                                                            <span
                                                                                style="color:white;background:red;">Rejected</span>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </center>
                                            <br /><br />
                                            {{-- <center>
                                                <p
                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;margin-left:3.5in;text-indent:.5in;line-height:115%;border:none;'>
                                                    <strong><u>{{ $student->first_name }}
                                                            {{ $student->last_name }}</u></strong>
                                                </p>
                                                <p
                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;margin-left:3.5in;text-indent:.5in;line-height:115%;border:none;'>
                                                    Student&rsquo;s Signature</p>
                                                <p
                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:justify;line-height:115%;border:none;'>
                                                    <br>
                                                </p>
                                                <p
                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:justify;line-height:115%;border:none;'>
                                                    &nbsp;</p>
                                                <p
                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:justify;line-height:115%;border:none;'>
                                                    Reccomending Approval:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                    &nbsp;
                                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                    &nbsp;
                                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Approved:</p>
                                                <p
                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:justify;text-indent:.5in;line-height:115%;border:none;'>
                                                    <strong><u><span
                                                                style="text-decoration:none;">&nbsp;</span></u></strong>
                                                </p>
                                                <p
                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:justify;text-indent:.5in;line-height:115%;border:none;'>
                                                    <strong><u><span
                                                                style="text-decoration:none;">&nbsp;</span></u></strong>
                                                </p>
                                                <p
                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:justify;text-indent:.5in;line-height:115%;border:none;'>
                                                    <strong><u>
                                                            @if ($enrolled[0]->chairman_name != null)
                                                                @php
                                                                    $name = explode(' ', $enrolled[0]->chairman_name);
                                                                    echo $name[0] . ' ' . $name[1];
                                                                @endphp
                                                            @endif
                                                        </u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        &nbsp;
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        &nbsp; &nbsp; &nbsp; &nbsp;<u>Dr. Jocelyn B. Barbosa,
                                                            PhD</u></strong>
                                                </p>
                                                <p
                                                    style='margin:0in;margin-bottom:.0001pt;font-size:15px;font-family:"Arial",sans-serif;text-align:justify;text-indent:.5in;line-height:115%;'>
                                                    Chairman&rsquo;s Signature &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                    &nbsp;
                                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Dean&rsquo;s
                                                    Signature</p>
                                            </center> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {{-- <button class="btn btn-sm btn-success float-right"
                                    onclick="Export2Word('exportContent', '{{ $student->first_name }}_{{ $student->last_name }}_TOR');">Export
                                    as .doc</button> --}}

                                <a target="_blank"
                                    href="{{ url('student_data_code_export_as_document', ['code' => $code]) }}"
                                    class="btn btn-sm btn-success float-right">Export as document</a>
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
                                @if (count($tor) != 0)
                                    <button type="button" class="btn" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <img src="{{ asset('/storage/' . $tor[0]->tor_image) }}"
                                            class="img img-thumbnail" style="border:0px;" alt="">
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">TOR</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach ($tor as $image)
                                                        <img src="{{ asset('/storage/' . $image->tor_image) }}"
                                                            class="img img-thumbnail" style="border:0px;"
                                                            alt="">
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
