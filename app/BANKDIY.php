<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BANKDIY extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
      'tanggal_lahir',
        'gender',
        'marital_status',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'agama',
        'golongan_darah',
        'pekerjaan',
        'kewarganegaraan',
       'photo_data',
      'ttd_data',
        'berlaku_hingga',
        'user_operator',
        'IP_address',
        'flag_verifikasi_manual',
    ];
}
