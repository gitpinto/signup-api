<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Http\Controllers\ApiController;

class Member extends Model
{
    //use HasFactory;

    protected $table = 'members';

    protected $fillable = ['name','email','password','address','age'];
}
