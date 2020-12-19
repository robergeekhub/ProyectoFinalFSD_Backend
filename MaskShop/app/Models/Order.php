<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'deliveryDate',
        'user_id'
    ];
    public function user()
    {
       return $this->belongsTo('\App\Models\User');
    }
    public function products()
    {
        return $this->belongsToMany('\App\Models\Product');
    }
}