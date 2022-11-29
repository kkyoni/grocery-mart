<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'brand';
    protected $fillable = ['brand_name'];
}
