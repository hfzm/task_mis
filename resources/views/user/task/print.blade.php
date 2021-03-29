<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <style media="print" media="screen" type="text/css">
        @media{
            html{
                visibility: hidden;
            }
            body{
                visibility: hidden;
            }
        }
        @page{
            size: auto;
            margin: 0;
        }
        #print{
            visibility: visible;
            width: 21cm;
            margin: auto;
            margin-top: 40px;
        }
    </style>
    <style>
        body{
            width: 21cm;
            margin: auto;
            margin-top: 40px;
        }
    </style>
</head>
<body onload="window.print()">
    <div id="print">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>End Date</th>
                    <th>Assigned To</th>
                    <th>Performance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$task->title}}</td>
                        <td>{{$task->end_date}}</td>
                        <td>
                            @foreach($task->users as $user)
                                {{$user->name}}{{$task->users->count() > 1 ? ',' : ''}}
                            @endforeach
                        </td>
                        <td>
                            @if($task->result != null)
                                {{$task->result}}
                            @else
                                Incomplete
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>