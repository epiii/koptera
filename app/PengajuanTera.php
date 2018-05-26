<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanTera extends Model
{
  protected $fillable =[
    'id_alatukur',
    'id_jenisuttp',
    'id_rekanan',
    'tgl_tera',
    'tgl_expired',
    'no_agenda',
    'status',
    'keterangan'
  ];
}
