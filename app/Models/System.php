<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;


    protected $table = 'system';

    protected $fillable = [
        'token',
        'images',
        'period',
        'url',
        'path',
        'status',
        'logout',

    ];
}
