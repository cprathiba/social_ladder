<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'image', 'price', 'discount', 'description', 'status'];

    protected $table = 'products';
}
