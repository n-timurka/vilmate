<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'listings';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'area', 'price', 'address', 'name', 'email', 'phone', 'photo', 'lat', 'lng'];
}
