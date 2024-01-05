<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Role;
use App\Models\TypeTask;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StatusTaskController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->post();

        $type = new TypeTask();
        $type->name = $data['name'];
        $type->project_id = $data['project_id'];
        $type->save();

        return redirect(route('project', ['id' => $data['project_id']]));
    }
}
