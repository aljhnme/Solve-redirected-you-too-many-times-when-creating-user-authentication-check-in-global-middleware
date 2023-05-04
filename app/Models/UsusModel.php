<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UsusModel extends Authenticatable
{   
    protected $table = 'usus';
    use HasFactory;
}
