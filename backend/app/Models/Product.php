<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'product';
    protected $fillable = ['name','price'];

    public function productimage()
    {
        return $this->hasMany('App\Models\ProductImage','product_id','id');
    }
}
