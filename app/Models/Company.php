<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'chat_company';
    protected $guarded = [];
    public $timestamps = false;
}
