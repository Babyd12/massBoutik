<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 *
 * @property $id
 * @property $quantity
 * @property $operation
 * @property $price
 * @property $product_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Stock extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['quantity', 'operation', 'price', 'product_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }

    public static function getCurrentStockByProductId($product_id)
    {
        return self::where('product_id', $product_id)->sum('quantity');
    }

    
    
}
