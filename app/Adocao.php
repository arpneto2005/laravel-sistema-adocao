<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adocao extends Model
{
    protected $table = 'adocoes';
    protected $fillable = ['email', 'valor', 'pet_id'];

    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}
