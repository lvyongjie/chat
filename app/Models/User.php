<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //关联的数据表
    protected $table = 'chat_user';
    //关闭时间戳
    public $timestamps = false;
}
