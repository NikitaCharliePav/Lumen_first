<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
       'id', 'user_id', 'ordered_at'
    ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
