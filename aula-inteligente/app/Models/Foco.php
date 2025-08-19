<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foco extends Model
{
    use HasFactory;

    protected $fillable = ['aula_id', 'estado'];

    public function aula() {
        return $this->belongsTo(Aula::class);
    }

    public function historial() {
        return $this->hasMany(HistorialFoco::class);
    }
}
