<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function tasks()
    {
        return $this->belongsTo('App\Models\Task');
    }
    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    protected $fillable = [
        'taskId',
        'answer',
    ];
}
