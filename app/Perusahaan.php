<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
  protected $fillable =[
    'nama',
    'alamat',
    'id_user'
  ];
}
