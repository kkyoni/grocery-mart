<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OrderProduct extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'order_product';
    protected $fillable = ['order_id', 'product_id', 'category_id', 'name', 'description', 'price', 'qty', 'main_price', 'new_offer', 'product_image'];
}
