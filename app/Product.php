<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'item_code',
        'name',
        'barcode',
        'qty',
        'price',
    ];
}
