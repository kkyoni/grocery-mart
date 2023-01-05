<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model{
    use Notifiable;
    protected $table = 'settings';
    protected $fillable = ['code','type','label','value','hidden'];
}