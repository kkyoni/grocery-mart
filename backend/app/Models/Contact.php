<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'contact';
    protected $fillable = ['first_name','last_name','email','message'];
}
