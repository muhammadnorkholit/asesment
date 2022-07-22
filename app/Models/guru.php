<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class guru extends Authenticatable
{
    use HasFactory;
    protected $table ='guru' ;
    protected $guard = 'guru';


}
