<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;
    protected $table = 'tentang';

    public function visi()
    {
        return $this->hasMany(Visi::class);
    }

    public function sejarah()
    {
        return $this->hasMany(Sejarah::class);
    }

    public function trainer()
    {
        return $this->hasMany(Trainer::class);
    }
}
