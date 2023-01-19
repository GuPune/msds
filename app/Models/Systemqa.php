<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Systemqa extends Model
{
    use HasFactory;


    protected $table = 'systemqa';

    protected $fillable = [
        'startf',
        'startl',
        'endf',
        'endl',

    ];
}
