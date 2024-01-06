<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Task;

class TaskCompletion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="task_completions";
    protected $primaryKey="task_completion_id";
    function users() {
        return $this->belongsTo(User::class);
    }
    function task() {
        return $this->belongsTo(Task::class);
    }

    function getCreatedAtAttribute($value) {
        return date('d-m-y', strtotime($value));
    }
}
