<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'promo';
    protected $fillable = ['promocodeimages', 'description', 'code', 'start_date', 'end_date', 'status', 'discount'];
}
