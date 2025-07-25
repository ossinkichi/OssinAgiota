<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Accounts extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'client_id',
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
}
