<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Expenses extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'describer',
        'observation',
        'tags'
    ];

    protected $hidden = [
        'user_id',
    ];
}
