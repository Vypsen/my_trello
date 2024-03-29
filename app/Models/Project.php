<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $descr
 * @property mixed $sdate
 * @property int $type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Project extends Model
{
    protected $fillable = [
        'name',
        'descr',
        'sdate',
        'type_id'
    ];

    protected $table = 'projects';

    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_users_projects', 'project_id', 'project_user')
            ->withPivot('project_role');
    }

    public function type()
    {
        return $this->belongsTo(TypeProject::class);
    }

    public function typesTasks()
    {
        return $this->hasMany(TypeTask::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    public function getTasksWithStatuses()
    {
        $typesTasks = $this->typesTasks;

        $arr = [];
        foreach ($typesTasks as $type) {
            if (count($type->tasks)) $arr[json_encode($type)] = $type->tasks;
            else $arr[json_encode($type)] = [];
        }

        return $arr;

    }

}
