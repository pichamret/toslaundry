<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //
    protected $table = "orders";
    
    protected $filltable =[
        'code',
        'ord_date',
        'weight',
        'discount',
        'price',
        'total',
        'paid',
        'status',
        'client_id',
    ];

    public function client() 
    {
        return $this->belongsTo('App\Clients','client_id');
    }
}
