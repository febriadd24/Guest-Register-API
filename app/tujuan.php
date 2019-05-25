<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tujuan extends Model
{
    protected $fillable = [
        'Nama', 'Department', 'Bagian','NIP','Availiable','Status',
    ];
}
