<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Favorite extends Model
{
    use HasFactory, UuidTrait;

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
