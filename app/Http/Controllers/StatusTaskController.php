<?php

namespace App\Http\Controllers;

use App\Models\TypeTask;
use Illuminate\Http\Request;

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
