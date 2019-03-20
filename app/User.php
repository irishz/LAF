<?php

namespace App;

use App\Form;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 1;
    const DEFAULT_TYPE = 0;

    protected $table = 'users';
    protected $primaryKey ='user_id';
    public $incrementing = false;

    public function isAdmin(){
        return $this->type === self::ADMIN_TYPE;
    }

    public function forms(){
        return $this->hasMany(Form::class);
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name','l_name', 'email', 'password','user_id','prename','position','department','section'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
