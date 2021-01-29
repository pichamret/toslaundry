<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class order_details extends Model
{
    protected $filltable=[
      'id',
      'qty',
      'price',
      'order_id',
      'item_id',
    ];
    
  // protected $filltable =[
  //     'qty', 
  //     'price',
  //     'amount',
  //     'order_id',
  //     'item_id',
  // ];

}
