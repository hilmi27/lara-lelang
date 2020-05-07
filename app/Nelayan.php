<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Nelayan extends Model
{
    use SoftDeletes;
    
    protected $table = "nelayan";
}
