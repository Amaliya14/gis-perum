<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembang extends Model
{
    protected $table = 'pengembang';
    protected $guarded = [];
    protected $fillable = ['nama', 'perumahan', 'email', 'alamat', 'no_tlpn'];
}
