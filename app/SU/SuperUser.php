<?php

namespace App\SU;

use Illuminate\Database\Eloquent\Model;

class SuperUser extends Model
{
    protected $fillable = ['name','password','role','api_token'];
}
