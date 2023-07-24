<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    const TYPES = [
        0 => 'Заказ со склада',
        1 => 'Мебель под заказ',
    ];

    public function furniture(): HasMany
    {
        return $this->hasMany(Furniture::class,'order_id')->orderBy('id');
    }

    public function checkType($type){
        return $this->type == $type;
    }
}
