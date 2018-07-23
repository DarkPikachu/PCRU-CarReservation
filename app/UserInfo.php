<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $table = 'user_info';

    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public function position()
    {
        return $this->hasOne('App\Position','position_code','position');
    }

    public function department()
    {
        return $this->hasOne('App\Department','department_code','department');
    }

    public function permission()
    {
        return $this->hasOne('App\Role','role_id', 'role');
    }
}
