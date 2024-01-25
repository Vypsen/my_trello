<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function view($id)
    {
        $project = Project::find($id);
//        $statusesTask = $project->typesTasks;
        $tasks = $project->getTasksWithStatuses();

        $role = DB::table('roles_users_projects')
            ->where('project_user', '=', Auth::user()->id)
            ->where('project_id', '=', $id)
            ->get('project_role')->last()->project_role;

        return view('project', ['project' => $project, 'tasks' => $tasks, 'role' => $role]);
    }

    public function create(Request $request)
    {
        $data = $request->post();

        $project = new Project();
        $project->name = $data['name'];
        $project->descr = $data['descr'];
        $project->type_id = $data['type_id'];
        $project->sdate = now();
        $project->save();

        $user = Auth::user();
        $role = Role::query()->where('name', '=', 'Редактор')->first();

        $project->users()->attach($user, ['project_role' => $role->id]);

        return redirect(route('home'));
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',
        ]);

        $data = $request->post();
        $user = User::query()->where('email', '=', $data['email'])->first();
        $project = Project::find($data['project_id']);
        if (!DB::table('roles_users_projects')->where("project_user", '=', $user->id)->where('project_id', '=', $data['project_id'])->first()) {
            $project->users()->attach($user, ['project_role' => $data['role_id']]);
        }

        return redirect(route('project', ['id' => $data['project_id']]));

    }
}
