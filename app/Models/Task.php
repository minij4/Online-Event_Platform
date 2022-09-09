<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->belongsTo('App\Models\Game');
    }

    

    protected $fillable = [
        'gameId',
        'type',
        'question',
        'answerId',
        'time',
        'url',
        'status',
    ];
}
