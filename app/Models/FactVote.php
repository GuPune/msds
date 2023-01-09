<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactVote extends Model
{
    use HasFactory;

    protected $table = 'fact_votes';

    protected $fillable = [
        'user_id',
        'headvotes_id',
        'votes_id'
    ];
}
