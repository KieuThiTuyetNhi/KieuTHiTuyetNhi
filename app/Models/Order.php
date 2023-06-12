<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use App\Models\ProductImage;
use App\Models\ProductStrore;
use App\Models\ProductSale;
class Order extends Model
{
    use HasFactory;
    protected $table='KTTN_order';

    public $timestamps = false;
    public function carthinh(): hasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id','id');
    }

   
}
