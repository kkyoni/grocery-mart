<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = ['brand_id','categories_name'];

    public function product_details()
    {
        return $this->hasOne('App\Models\Product','category_id','id')->with(['productimage']);
    }

    public function brand_details()
    {
        return $this->hasOne('App\Models\Brand','id','brand_id');
    }
}
