<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pdf download/stream app</title>

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    </head>
  <body>

    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Id</th>
        <th>Company Name</th>
        <th>Report Title</th>
        <th>Employee Name</th>
        <th>Report Date</th>
        <th>Duration</th>
        <th>Tasks</th>
        <th>Comment</th>
      </tr>
    </thead>
    @php
    $tasks = json_decode($report->tasks);
    @endphp

    <tbody>
      <tr>
        <td>{{$report->id}}</td>
        <td>{{$report->company_name}}</td>
        <td> {{$report->report_title}}</td>
        <td>{{$report->employee_name}}</td>
        <td>{{$report->report_date}}</td>
        <td>{{$report->duration}}</td>

        <td>
            @php
                foreach ($tasks as $task) {
                    echo '* '.$task->content; echo '<br>';
                }
            @endphp
        </td>


        <td>{{$report->comments}}</td>
      </tr>
    </tbody>
    </table>

  </body>
  </html>