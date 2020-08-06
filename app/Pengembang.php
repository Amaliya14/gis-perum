<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengembang extends Authenticatable
{
    protected $table = 'pengembang';
    protected $guarded = [];

    public function perumahan(){
      return $this->belongsTo(Perumahan::class, 'id_perumahan','id');
    }

    public function Chats(){
      return $this->belongsTo(Perumahan::class, 'id','id_admin');
    }

}
