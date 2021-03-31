<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $hidden = ["created_at", "updated_at"];
}
