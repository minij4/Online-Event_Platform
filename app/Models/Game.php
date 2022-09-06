<?php

namespace App\Models;

use App\Events\CheckStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;


class Game extends Model
{
    use HasFactory;

    public $table = "games";

    /// Event on status check
    protected static function booted()
    {
        static::updated(function ($item) {
            
        });
    }


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
        'stage',
        'status',
    ];
}
