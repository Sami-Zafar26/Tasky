<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\TaskCompletion;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='tasks';
    protected $primaryKey='id';
    function users() {
        return $this->belongsTo(User::class);
    }
    function taskscompletion() {
        return $this->hasMany(TaskCompletion::class);
    }

    function getCreatedAtAttribute($value) {
        return date('d-m-y | H:i:s a', strtotime($value));
    }
}
