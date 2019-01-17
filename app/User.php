<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /*
    *   Field  Type
    *   id  int(100)
    *   name    varchar(255)
    *   apellido1   varchar(255)
    *   run int(100)
    *   email   varchar(255)
    *   password    varchar(255)
    *   rol_id  int(100)
    *   log_id  int(100)
    *   created_at  datetime
    *   updated_at  datetime

    */

    protected $table = 'users';
    protected $fillable = [
                            'name',
                            'apellido1',
                            'run',
                            'email',
                            'password', 
                            'rol_id',
                            'log_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
