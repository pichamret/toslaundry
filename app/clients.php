<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model
{
    //
    protected $table = "clients";

    protected $filltable = [
        'name',
        'phone',
        'note',
    ];

    public function order()
    {
        return $this->hasMany('App\Orders');
    }
}
