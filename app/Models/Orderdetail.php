<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table='KTTN_orderdetail';
    public $timestamps = false;
    public function sanpham() {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
