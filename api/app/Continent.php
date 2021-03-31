<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $fillable = [
        'name',
        'initials',
    ];

    protected $hidden = ["created_at", "updated_at"];
}
