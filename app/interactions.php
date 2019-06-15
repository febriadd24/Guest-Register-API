<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class interactions extends Model
{
    //
    protected $fillable = [
        'id','title', 'description', 'NIK','Nama','tujuan','waktu_masuk','waktu_keluar','operator_id','notified','aceppted'
    ];
}
