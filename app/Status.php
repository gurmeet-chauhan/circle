<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = [];
    
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
