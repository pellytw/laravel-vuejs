<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //


	/**
	 * Get the order that owns the phone.
	 */
	public function order()
	{
	    return $this->belongsTo('App\Order');
	}


}
