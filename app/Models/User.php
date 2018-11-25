<?php
/**
 * Created by IntelliJ IDEA.
 * User: pc
 * Date: 2018-09-30
 * Time: 오후 10:00
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
// 비밀번호 변경 메일을 위해 필요한 trait
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'userid';
    public $timestamps = false;

    protected $guarded = ['id', 'remember_token'];
    protected $hidden = ['password', 'remember_token'];
}
