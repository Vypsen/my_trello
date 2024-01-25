<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $descr
 * @property mixed $cdate
 * @property mixed $sdate
 * @property string $priority
 * @property int $project_id
 * @property int $type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $creator_id
 */
class Task extends Model
{
    protected $table = 'tasks';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function type()
    {
        return $this->belongsTo(TypeTask::class);
    }

    public function getColorPriority($priority)
    {
        return ['Высокий' => 'rgba(255, 150, 150, 0.9)', 'Средний' => 'rgba(180,223,255, 0.9)', 'Низкий' => 'rgba(178, 255, 166, 0.9)'][$priority];
    }

    public function subtasks()
    {
        return $this->hasMany(Subtask::class);
    }
}
