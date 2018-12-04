<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //


	/**
   * Get the order_details for the blog post.
   */
  public function order_details()
  {
      return $this->hasMany('App\OrderDetail');
  }

}
