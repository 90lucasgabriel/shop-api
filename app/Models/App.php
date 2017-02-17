<?php
/*
namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use HasApiTokens, Notifiable, TransformableTrait;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'remember_token'];
    protected $hidden = ['password', 'remember_token'];

    public function client(){
        return $this->hasOne(Client::class);
    }
}
*/