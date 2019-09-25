<?php

namespace App\Model;
class User extends \Illuminate\Foundation\Auth\User implements \Illuminate\Contracts\Auth\Authenticatable//用户表
{
	protected $rememberTokenName = NULL;
    protected $table = 'chat_user';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded=[];
}