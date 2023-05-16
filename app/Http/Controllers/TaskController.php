<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function task()
    {
        $task = Task::get();
        return view('task', ['tasks'=> $task]);
    }

    public function taskView($task_id)
    {
        $task = Task::find($task_id);
        return view('taskEdit', compact('task'));
    }

    public function addTask(Request $request)
    {
        Task::create([
            'user_id' =>auth()->user()->id,
            'task' => $request->task,
            'duedate' => $request->duedate,
            'duetime' => $request->duetime
        ]);

        return redirect()->back()->with('status','Task Added Successfully');
    }

    public function delete($task_id)
    {
        $task = Task::find($task_id);
        $task->delete();
        return redirect()->back()->with('status','Task Delete Successfully');
    }

    public function confirm($task_id)
    {
        $task = Task::find($task_id);
        $task->status = 1;
        $task->update();
        return redirect()->back()->with('status','Task Confirmed Successfully');
    }

    public function update(Request $request, $task_id)
    {
        $task = Task::find($task_id);
        $task->task = $request->input('task');
        $task->duedate = $request->input('duedate');
        $task->duetime = $request->input('duetime');
        $task->update();
        $task = Task::get();
        return view('task', ['tasks'=> $task])->with('status','The Patient was Successfully Deleted');

    }
}
