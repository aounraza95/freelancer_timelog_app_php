<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelogsModel extends Model
{
    use HasFactory;

    protected $table = 'tasks_timelog';

    public function tasks() {
        return $this->hasOne(TaskssModel::class, 'id', 'task_id');
    }
}
