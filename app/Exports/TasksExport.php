<?php

namespace App\Exports;

use App\Task;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TasksExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Task::all();
    // }

    public function view(): View
    {
        $tasks = Task::where('user_id', Auth::user()->id)->where('status', 0)->with('users')->orderBy('id', 'desc')->get();
        return view('user.task.report', compact('tasks'));
    }
}
