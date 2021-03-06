<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    protected $fillable = [
        'url'
    ];

    protected $hidden = ["created_at", "updated_at"];
}
