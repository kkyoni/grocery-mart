<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'chat';
    protected $fillable = [
        'to_user_id',
        'from_user_id',
        'chat_message',
    ];
}
