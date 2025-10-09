<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tags extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'description',
        'color-text',
        'color-background'
    ];
}
