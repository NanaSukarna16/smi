<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
     use HasFactory;
     protected $table = 'profil_trainer';
      
     public function tentang()
    {
        return $this->belongsTo(Tentang::class);
    }
}
