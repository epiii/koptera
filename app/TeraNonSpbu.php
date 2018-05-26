<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\PengajuanTera;

class TeraNonSpbu extends Model
{
  protected $fillable =[
    'tgl_tera',
    'tgl_expired'
    'status'
    'id_rekanan'
  ];
}
