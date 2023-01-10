<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headvote extends Model
{
    use HasFactory;

    protected $table = 'headvotes';

    protected $fillable = [
        'title',
        'start',
        'end',
        'type',
        'period',
    ];

}
