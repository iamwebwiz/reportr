<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf download/stream app</title>
  </head>
  <body>

    <div class="container">
      <h4><strong>COMPANY NAME</strong></h4>
      <p>{{ $report['company_name'] }}</p>
      <br>
      <h4><strong>REPORT TITLE</strong></h4>
      <p>{{ $report['report_title'] }}</p>
      <br>
      <h4><strong>DATE</strong></h4>
      <p>{{ date('d/m/Y', strtotime($report['report_date'])) }}</p>
      <br>
      <h4><strong>EMPLOYEE NAME</strong></h4>
      <p>{{ $report['employee_name'] }}</p>
      <br>
      <h4><strong>TASK(S) COMPLETED</strong></h4>
      <p>
        <ul class="list-group">
          @foreach ($tasks as $task)
            <li class="list-group-item">{{ $task['content'] }}</li>
          @endforeach
        </ul>
      </p>
      <br>
      <h4><strong>DURATION</strong></h4>
      <p>{{ $report['duration'] }}</p>
      <br>
      <h4><strong>COMMENTS</strong></h4>
      <p>{{ $report['comments'] }}</p>
    </div>

  </body>
  </html>
