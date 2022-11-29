<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Otp extends Model
{
    use SoftDeletes;
    protected $table='otps';
    protected $fillable = [
    	'email',
        'otp_number',
        'otp_expire',
    ];
    protected $casts = [
	    'email'   			=>   'string',
	    'otp_number'	=>   'string',
	    'otp_expire'        =>  'string',
    ];
    protected function castAttribute($key, $value)
    {
        if (! is_null($value)) {
            return parent::castAttribute($key, $value);
        }
        switch ($this->getCastType($key)) {
            case 'int':
            case 'integer':
            return (int) 0;
            case 'real':
            case 'float':
            case 'double':
            return (float) 0;
            case 'string':
            return '';
            case 'longtext':
            return '';
            case 'bool':
            case 'boolean':
            return false;
            case 'object':
            case 'array':
            case 'json':
            return [];
            case 'collection':
            return new BaseCollection();
            case 'date':
            return $this->asDate('0000-00-00');
            case 'datetime':
            return $this->asDateTime('0000-00-00');
            case 'timestamp':
            return '';
            default:
            return $value;
        }
    }

    public function user(){
        return $this->hasOne(\App\Models\User::class,'email','email');
    }
}
