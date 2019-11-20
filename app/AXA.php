<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AXA extends Model
{
    //
    protected $fillable = [
        'id','AGAMA',
            'ALAMAT',
            'COUNT_DATA',
            'JENIS_KLMIN',
            'JENIS_PKRJN',
            'KAB_NAME',
            'KEC_NAME',
            'KEL_NAME',
            'NAMA_LGKP',
            'NAMA_LGKP_IBU',
            'NIK',
            'NO_KAB',
            'NO_KEC',
            'NO_KEL',
            'NO_KK',
            'NO_PROP',
            'NO_RT',
            'NO_RW',
            'PDDK_AKH',
            'PROP_NAME',
            'STATUS_KAWIN',
            'STAT_HBKEL',
            'TGL_LAHIR',
            'TMPT_LAHIR',
    ];
}
