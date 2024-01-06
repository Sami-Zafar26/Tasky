<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalRecord extends Model
{
    use HasFactory;

    protected $table='withdrawal_records';
    protected $primaryKey='id';
    protected $fillable=[
        'withdrawal_amount',
        'payment_method_id',
        'user_id',
        'status',
    ];

    function withdrawal_records_of_user() {
        return $this->belongsTo(User::class);
    }
}
