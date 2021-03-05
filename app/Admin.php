<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name', 'email','password'
    ];
 	protected $table = 'tbl_admin';
}
