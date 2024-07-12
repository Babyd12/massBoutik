<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UnitPerPack
 *
 * @property $id
 * @property $title
 * @property $number
 * @property $created_at
 * @property $updated_at
 *
 * @property Product[] $products
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UnitPerPack extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'number'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'id', 'unit_per_pack_id');
    }
    
}
