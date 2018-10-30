<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = ['brand', 'description', 'model','price'];


     /**
     * Scope a query to only include users of a given type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfBrand($query, $brand)
    {
        return $query->where('brand', $brand, "%query%");
    }



}
