<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  string cname
 * @property  int status
 * @property  string tel
 * @property  string password
 * @property string type
 * @property string created_at
 */
class User extends Model
{
    //定义模型关联的数据表
    protected $table = 'chat_user';
    //定义主键
    protected $primaryKey = 'id';
    //定义禁止操作时间
    public $timestamps = false;
    //设置允许写入的字段
    protected $fillable = ['cname','status','password','type','tel','created_at',];
}
