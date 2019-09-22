<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $fillable = ['login_id', 'ip', 'os', 'device', 'browser', 'city', 'country', 'status', 'logout'];
}
