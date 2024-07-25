<?php

namespace App\Models;

use App\Enums\CodeDevise;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $purchace_price
 * @property $selling_price
 * @property $state
 * @property $unit_per_pack_id
 * @property $created_at
 * @property $updated_at
 *
 * @property UnitPerPack $unitPerPack
 * @property ProductLend[] $productLends
 * @property Stock[] $stocks
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    use HasFactory;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'purchace_price', 'selling_price', 'state', 'unit_per_pack_id'];
    

    public static function getTotalProfit($products)
    {
        $totalProfit = 0;
        foreach ($products as $product) {
            $totalQuantity = 0; 
            foreach($product->stocks as $stock){
                if($stock->quantity){
                    $totalQuantity += $stock->quantity;
                }else{
                    break;
                }
            }
            $totalProfit += $product->selling_price * $totalQuantity;
        }
        return self::money_format($totalProfit);
    }

    public static function money_format($format)
    {
        return number_format($format, 0, '.', ',');
    }

    public function stateFormat()
    {
        return $this->state == 1? 'Active' : 'Inactive';
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unitPerPack()
    {
        return $this->belongsTo(\App\Models\UnitPerPack::class, 'unit_per_pack_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productLends()
    {
        return $this->hasMany(\App\Models\ProductLend::class,  'product_id', 'id',);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocks()
    {
        return $this->hasMany(\App\Models\Stock::class,  'product_id', 'id',);
    }
    
}
