<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class tbl_users extends Authenticatable
{
    protected $primaryKey = 'user_id';

    protected $table = 'tbl_users';
}
