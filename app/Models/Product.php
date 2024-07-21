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
    

    public  function getTotalProfitPerProduct()
    {
        //selling_price = profitPerUnit, so dont need to do $this->selling_price - $this->purchase_price;
        $unitPerPack = $this->unitPerPack->number;
        $profit = $this->selling_price  * $unitPerPack;
        return $profit;
    }   

    public static function getTotalProfit($products)
    {
        $totalProfit = 0;
        foreach ($products as $product) {
            $totalProfit += $product->getTotalProfitPerProduct();
        }
        return number_format($totalProfit, 0, ',', ' ');
    }

    public function money_format()
    {
        return number_format($this->selling_price, 2, '.', ',');
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
