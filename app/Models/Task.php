<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        return ['Высокий' => 'rgba(240, 116, 100, 0.9)', 'Средний'=> 'rgba(248, 252, 217, 0.9)', 'Низкий' => 'rgba(255, 255, 255, 0.9)'][$priority];
    }
}
