@extends('user.layouts.user')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Inbox Tasks</h3>
            <a href="{{route('inboxPrint')}}" target="_blank" class="btn btn-secondary btn-sm float-right m-l-10"><i class="fa fa-print"></i></a>
            <a href="{{route('InboxExport')}}" class="btn btn-success btn-sm float-right">Excel</a>
        </div>
        <div class="card-body">
            @if($tasks->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Assigned To</th>
                            <th>Performance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->start_date }}</td>
                                <td>{{ $task->end_date }}</td>
                                <td>
                                    @foreach ($task->users as $user)
                                        {{ $user->name }}{{$task->users->count() > 1 ? ',' : ''}}
                                    @endforeach
                                </td>
                                <td>
                                    @if($task->result != null)
                                        {{\Illuminate\Support\str::limit($task->result, 50, ' ...')}}
                                    @else
                                        Incomplete
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('taskShow', $task->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></a>
                                    <a href="{{route('taskEdit', $task->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h5 class="text-center">No Records</h5>
            @endif
        </div>
    </div>
@endsection