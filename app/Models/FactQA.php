<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactQA extends Model
{
    use HasFactory;

    protected $table = 'factqa';
    protected $fillable = [
        'user_id',
        'qa_id',
    ];
}
