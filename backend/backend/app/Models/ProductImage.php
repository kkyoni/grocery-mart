<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'product_image';
    protected $fillable = ['product_id','image'];
}
