<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Usar $guarded para indicar que nos permita editar cualquier campo menos el 'id'
    protected $guarded = ['id'];

}
