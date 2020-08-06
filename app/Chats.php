<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    // protected $table = 'infoperum';
    protected $guarded = [];

    public function pengembang(){
        return $this->hasOne(Pengembang::class, 'id', 'id_admin');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
