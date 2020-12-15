<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image_path',
        'category_id',
    ];
    
    public function category()
    {
       return $this->belongsTo('App\Models\Category');
}
    public function order()
    {
        return $this->belongsToMany('App\Models\Order');
    }

}

