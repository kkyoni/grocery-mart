<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'order';
    protected $fillable = ['invoice', 'user_id', 'address_id', 'promo_id', 'comment', 'grandtotal', 'status', 'payment_mode', 'maintotal', 'promototal', 'date'];
    public function OrderProductDetails()
    {
        return $this->hasMany('App\Models\OrderProduct', 'order_id', 'id');
    }
    public function UserAddressDetails()
    {
        return $this->hasOne('App\Models\UserAddress', 'id', 'address_id');
    }
    public function user_details()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
