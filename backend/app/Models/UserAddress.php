<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'user_address';
    protected $fillable = ['user_id', 'zip', 'street_address', 'states', 'optional', 'city', 'country'];
}
