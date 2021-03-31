<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'continents_id',
        'flags_id',
        'capitals_id',
    ];

    protected $hidden = [
        'continents_id',
        'flags_id',
        'capitals_id',
        'created_at',
        'updated_at'
    ];

    public function continent()
    {
        return $this->belongsTo('App\Continent','continents_id');
    }

    public function flag()
    {
        return $this->belongsTo('App\Flag','flags_id');
    }

    public function capital()
    {
        return $this->belongsTo('App\Capital','capitals_id');
    }
}
