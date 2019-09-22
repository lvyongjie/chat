<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetUp extends Model
{ 
    protected $table='chat_set_up';
    protected $primiryKey='id';
    public $timestamps=false;
    protected $fillable=['id','message_api','ws_url']; 
    
}
