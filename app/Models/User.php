<?php

namespace App\Models;

use App\Models\ProductLend;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authententicatable;

/**
 * Class User
 *
 * @property $id
 * @property $full_name
 * @property $nick_name
 * @property $description
 * @property $picture
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $role
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Phone $phone
 * @property Role $role
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class User extends Authententicatable
{
    use HasFactory  ;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['full_name', 'nick_name', 'description', 'picture', 'email', 'role'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function phones()
    {
        return $this->hasMany(Phone::class, 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'name');
    }

    public function productLends()
    {
        return $this->hasMany(ProductLend::class);
    }

    public function getImageAttribute()
    {
        if ($this->picture) {
            return asset('storage/users/' . $this->picture);
        }

        return asset('storage/users/default.png');
    }


    
}
