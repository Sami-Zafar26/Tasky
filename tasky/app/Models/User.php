<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Task;
use App\Models\TaskCompletion;
use App\Models\PaymentMethod;
use App\Models\WithdrawalRecord;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    function tasks(){
        return $this->hasMany(Task::class);
    }

    function taskscompletion(){
        return $this->hasMany(TaskCompletion::class);
    }

    function getCreatedAtAttribute($value) {
        return date('d-m-y | H:i:s a', strtotime($value));
    }

    function payment_methods() {
        return $this->hasMany(PaymentMethod::class);
    }

    function withdrawal_cash() {
        return $this->hasMany(WithdrawalRecords::class);
    }
}
