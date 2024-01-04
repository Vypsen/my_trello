<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    public function project()
    {
        return view('project');
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
}
