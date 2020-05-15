<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Lelang extends Model
{
    use SoftDeletes;
    
    protected $table = 'lelang';

    protected $fillable = ['id_ikan','title','jenis_ikan','slug','photo','kualitas','ukuran','qty','harga_awal','tgl_lelang','detail','status'];

    public function ikan()
    {
    return $this->belongsTo('App\Ikan','id_ikan');
    }
}
