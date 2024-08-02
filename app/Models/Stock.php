<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    protected $fillable = ['quantity', 'operation', 'operation_type', 'price', 'product_id', 'lend_id'];

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }

    public function lend(): BelongsTo
    {
        return $this->belongsTo(Lend::class);
    }
    
    public static function getCurrentStockByProductId($product_id)
    {
        return self::where('product_id', $product_id)->sum('quantity');
    }
    

    public static function getStockByOperation($operation, $period = null)
    {
        switch ($period) {
            case 'daily':
                return self::where('operation', $operation)
                    ->whereDate('created_at', '=', now()->toDateString())
                    ->get();
                break;

            case 'weekly':
                return self::where('operation', $operation)
                    ->whereDate('created_at', '>=', now()->startOfWeek())
                    ->whereDate('created_at', '<=', now()->endOfWeek())
                    ->get();
                break;

            case 'monthly':
                return self::where('operation', $operation)
                    ->whereDate('created_at', '>=', now()->startOfMonth())
                    ->whereDate('created_at', '<=', now()->endOfMonth())
                    ->get();
                break;

            case 'yearly':
                return self::where('operation', $operation)
                    ->whereDate('created_at', '>=', now()->startOfYear())
                    ->whereDate('created_at', '<=', now()->endOfYear())
                    ->get();
                break;

            default:
                return self::where('operation', $operation)
                    ->get();
        }
    }
}
