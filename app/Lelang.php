<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Lelang extends Model
{
    use SoftDeletes;
    
    protected $table = 'lelang';
}
