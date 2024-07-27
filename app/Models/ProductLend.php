<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductLend
 *
 * @property $id
 * @property $product_id
 * @property $lend_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Lend $lend
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductLend extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['product_id', 'lend_id', 'user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lend()
    {
        return $this->belongsTo(Lend::class, 'lend_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
}
