<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interactions extends Model
{
    //
    public function DataPengunjung()
    {
       return $this->hasOne('App\pengunjung','NIK','NIK');
    }
    protected $fillable = [
        'id','title', 'description', 'NIK','Nama','tujuan','waktu_masuk','waktu_keluar','operator_id','notified','aceppted','created_at'
    ];

}
