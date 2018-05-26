<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlatUkur extends Model
{
  protected $fillable =[
    'id_perusahaan',
    'id_uttp',
    'tipe',
    'id_merk',
    'id_uom',
    'no_seri',
    'kapasitas',
  ];
}
