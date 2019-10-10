<?php

namespace App;

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use DB;

class d_user extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table       = 'm_member';
    protected $primaryKey  = 'cm_id';
    public $incrementing   = false;
    public $remember_token = false;
    protected $hidden = [
        'password', 'remember_token',
    ];
    const CREATED_AT       = 'cm_create_at';
    const UPDATED_AT       = 'cm_update_at';

    protected $fillable = ['cm_id','cm_name','cm_email', 'cm_code' ,'cm_username', 'password', 'cm_lastlogin', 'cm_lastlogout','status_data'];


    public function findForPassport($username)
    {
        return $this->where('cm_username', $username)->first();
    }

}
