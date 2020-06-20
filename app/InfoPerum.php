<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPerum extends Model
{
    protected $table = 'infoperum';
    protected $guarded = [];
    protected $fillable = ['nama_perumahan', 'tipe', 'harga', 'keterangan', 'foto'];
}
