<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'form';
    
    public function users(){
    
        return $this->belongTo(User::class,'user_id');
    }

    public function build()
    {
        return $this->markdown('mail.send-approve');
    }
}
