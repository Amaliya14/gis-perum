<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    protected $table = 'perumahan';
    protected $guarded = [];

    public function pengembang(){
      return $this->hasOne(Pengembang::class, 'id_perumahan', 'id');
    }

    public function info(){
      return $this->hasOne(InfoPerum::class, 'id_perumahan', 'id');
    }
}
