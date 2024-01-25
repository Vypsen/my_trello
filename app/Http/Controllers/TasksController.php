<?php

namespace App\Http\Controllers;

use App\Models\Subtask;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $task->creator_id = Auth::user()->id;

//        return $task;

        $task->save();

        return redirect(route('project', ['id' => $data['project_id']]));
    }

    public function view($id)
    {
        $task = Task::find($id);
        $project = $task->project;
        $subtasks = $task->subtasks;

        return view('task', ['task' => $task, 'project' => $project, 'subtasks' => $subtasks]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'taskId' => 'required',
            'sdate' => 'required',
            'priority' => 'required',
        ]);

        $data = $request->post();

        if ($task = Task::find($data['taskId'])) {
            $task->name = $data['name'];
            $task->descr = $data['descr'];
            $task->sdate = $data['sdate'];
            $task->priority = $data['priority'];
            $task->type_id = $data['type_id'];
            $task->save();
        }

        foreach ($data['subtasks'] as $subtask) {
            if ($subtask) {
                $subtaskModel = new Subtask();
                $subtaskModel->task_id = $task->id;
                $subtaskModel->name = $subtask;
                $subtaskModel->status = false;

                $subtaskModel->save();
            }
        }

        return true;

    }
}
