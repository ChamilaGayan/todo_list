<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $task = Task::get();
        $task_count = $task->count();
        $newtask = Task::where('status','=','0')->count();
        $completedTask = Task::where('status','=','1')->count();

        return view('home', compact('task_count', 'newtask', 'completedTask'));
    }
}
