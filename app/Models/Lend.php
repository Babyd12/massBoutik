<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Lend
 *
 * @property $id
 * @property $quantity
 * @property $date
 * @property $state
 * @property $service_id
 * @property $user_id
 * @property $advance
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Service $service
 * @property ProductLend[] $productLends
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lend extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['quantity', 'advance', 'operation_type', 'date', 'payment_status', 'service_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class, 'service_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productLends()
    {
        return $this->hasMany(\App\Models\ProductLend::class, 'lend_id', 'id' );
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(\App\Models\Stock::class, 'stock_id', 'id' );
    }
    
}
