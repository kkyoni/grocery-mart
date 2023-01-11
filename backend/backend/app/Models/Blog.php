<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'blog';
    protected $fillable = ['title','description','image'];
    public function Comment()
    {
        return $this->hasMany('App\Models\Comment','blog_id','id')->with('UserDetails')->orderBy('updated_at', 'desc')->limit(3);
    }
}
