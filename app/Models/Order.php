<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id', 'customer_phone', 'customer_name', 'locale', 'payment_method',
        'status', 'total'];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function products()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}
