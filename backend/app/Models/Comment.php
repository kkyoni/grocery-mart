<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'comment';
    protected $fillable = ['user_id', 'blog_id', 'comment'];
    public function UserDetails()
    {
        return $this->hasMany('App\Models\User','id','user_id');
    }
}
