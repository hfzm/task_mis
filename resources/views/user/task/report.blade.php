<table>
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