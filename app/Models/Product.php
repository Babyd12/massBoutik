<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $purshacePrice
 * @property $sellingPrice
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
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'purshacePrice', 'sellingPrice', 'state', 'unit_per_pack_id'];


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
        return $this->hasMany(\App\Models\ProductLend::class, 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocks()
    {
        return $this->hasMany(\App\Models\Stock::class, 'id', 'product_id');
    }
    
}
