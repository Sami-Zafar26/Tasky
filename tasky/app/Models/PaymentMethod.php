<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable=[
        'bank_name',
        'account_name',
        'account_number',
    ];

    function payment_method_of_user() {
        return $this->belongsTo(User::class);
    }
}
