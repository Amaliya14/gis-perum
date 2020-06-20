<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    protected $table = 'perumahan';
    protected $guarded = [];
    protected $fillable = ['nama_perumahan', 'lokasi', 'kecamatan', 'jumlah_rumah', 'luas_lahan_bangunan', 'latitude', 'longitude', 'foto'];
}
