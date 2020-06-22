<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPerum extends Model
{
    protected $table = 'infoperum';
    protected $guarded = [];

    public function perumahan(){
      return $this->belongsTo(Perumahan::class, 'id_perumahan','id');
    }
}
