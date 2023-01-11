<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PromoUser extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'promo_user';
    protected $fillable = ['promo_id', 'user_id'];
    public function UserDetails()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}