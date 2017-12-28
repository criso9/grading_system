<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

	use Notifiable;
    
    protected $table = 'students';
    
    protected $hidden = [
        
    ];

    protected $guarded = [];

    public static $rules = [
       'stud_no' => 'required',
        'course' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'birth_date' => 'required',
        'gender' => 'required',
        'address' => 'required'
    ];
}
