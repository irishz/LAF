<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'form';
    
    protected $fillable = [
        'date_leave','leave_type', 'number_date_leave', 'leave_cause'
    ];

    public function users(){
    
        return $this->belongTo(User::class,'user_id');
    }

    public function build()
    {
        return $this->markdown('mail.send-approve');
    }
}
