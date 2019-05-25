<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengunjung extends Model
{
    protected $fillable = [
        'NIK', 'Nama', 'TempatLahir','TglLahir','JenisKelamin','GolDarah','Alamat','RT','RW','Kecamatan','Kelurahan',
        'Agama','status','Pekerjaan','Provinsi','Kota','Kewarganegaraan','Foto','TandaTangan','FingerPrint',
    ];
}
