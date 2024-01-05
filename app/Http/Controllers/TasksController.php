<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Role;
use App\Models\Task;
use App\Models\TypeTask;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TasksController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->post();

        $task = new Task();
        $task->name = $data['name'];
        $task->descr = $data['descr'];
        $task->type_id = $data['type_id'];
        $task->project_id = $data['project_id'];
        $task->cdate = now();
        $task->sdate = $data['sdate'];
        $task->priority = $data['priority'];

//        return $task;

        $task->save();

        return redirect(route('project', ['id' => $data['project_id']]));
    }
}
