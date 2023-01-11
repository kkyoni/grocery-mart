<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'faq';
    protected $fillable = ['question','answer','status'];
}
