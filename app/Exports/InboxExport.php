<?php

namespace App\Exports;

use App\Task;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InboxExport implements FromView
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
        $tasks = Auth::user()->tasks()->where('status', 0)->latest()->get();
        return view('user.task.report', compact('tasks'));
    }
}
