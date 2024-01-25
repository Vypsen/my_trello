<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property string $name
 * @property int $task_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $status
 */
class Subtask extends Model
{
    protected $table = 'subtasks';

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
