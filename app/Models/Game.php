<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Game extends Model
{
    use HasFactory;

    public $table = "games";


    public function events()
    {
        return $this->belongsTo('App\Models\Event');
    }
    
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }


    protected $fillable = [
        'eventId',
        'gameName',
        'status',
    ];
}
