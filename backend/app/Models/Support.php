<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'support';
    protected $fillable = ['supportname', 'supportemail', 'supportmessage'];
}
