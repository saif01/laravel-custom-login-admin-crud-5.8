<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['login', 'password', 'name', 'contact', 'email', 'image', 'status', 'super', 'publish', 'recruit', 'about', 'news', 'csr', 'product'];
}
