<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function status()
    {
        $this->belongsTo(User::class);
    }
}
