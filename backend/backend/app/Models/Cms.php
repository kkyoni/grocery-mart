<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'cms';
    protected $fillable = ['title','description','status'];
}
