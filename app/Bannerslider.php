<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bannerslider extends Model
{
    protected $table = 'bannersliders';

    protected $fillable = ['photo','title','note','link'];
}
