<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AccountModel extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'description',
        'value',
        'installments',
        'status',
        'date_of_paid',
        'paid_value',
        'installments_paid',
        'tags'
    ];

    protected $hidden = [
        'client_id'
    ];
}
