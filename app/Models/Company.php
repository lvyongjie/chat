<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //关联的数据表
    protected $table = 'chat_company';

    public $timestamps = false;
}
