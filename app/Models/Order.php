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

    const TYPES_ADDRESS = [
        0 => 'местонахожения склада Продавца',
        1 => 'местонахожения или места жительства Покупателя',
        2 => 'иное',
    ];

    const TYPES_PAYMENT = [
        0 => 'передачи наличного внесения денежных средств в кассу Продавца',
        1 => 'безналичного перечисления денежных средств по реквизитам Продавца, указанным в настоящем Договоре',
    ];

    public function furniture(): HasMany
    {
        return $this->hasMany(Furniture::class,'order_id')->orderBy('id');
    }

    public function checkType($type){
        return $this->type == $type;
    }
}
