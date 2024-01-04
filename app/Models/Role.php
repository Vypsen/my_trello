<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'name',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'roles_users_projects', 'project_role', 'project_id');
    }

}
