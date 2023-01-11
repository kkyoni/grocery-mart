<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'cart';
    protected $fillable = ['product_id','user_id','quantity','price','total_price'];

    public function Product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
