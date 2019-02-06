<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reportr</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center">{!! $data['reportTitle'] !!}</h3>

    <h4>Employee Name</h4>
    <p>{!! $data['employeeName'] !!}</p>

    <h4>Date</h4>
    <p>{!! $data['reportDate'] !!}</p>

    <h4>Duration</h4>
    <p>{!! $data['duration'] !!}</p>


    <h4>Tasks</h4>
    <ul class="list-group">
        @foreach ($data['tasks'] as $task)
            <li class="list-group-item">{!! $task['content'] !!}</li>
        @endforeach
    </ul>

    <h4>Comments</h4>
    <p>{!! $data['comments'] !!}</p>
</body>
</html>