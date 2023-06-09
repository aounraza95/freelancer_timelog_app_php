<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskssModel extends Model
{
    use HasFactory;

    protected $table = "tasks";

    public function timelogs() {
        return $this->hasMany(TimelogsModel::class, 'task_id');
    }
}
