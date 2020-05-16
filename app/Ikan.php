<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Ikan extends Model
{
    use SoftDeletes;
    
    protected $table = "ikan";

    protected $fillable = ['photo','jenis_ikan','kualitas','ukuran','qty','harga','tgl_masuk','wilayah_penangkapan'];
    public function lelang()
        {
        return $this->hasMany('App\Lelang');
        }
}

