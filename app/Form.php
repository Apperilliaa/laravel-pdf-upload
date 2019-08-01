<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = "datafile";
 
    protected $fillable = ['name','file'];
}
