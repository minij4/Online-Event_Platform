<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }

    protected $fillable = [
        'userId',
        'eventName',
        'stages',
    ];
}

