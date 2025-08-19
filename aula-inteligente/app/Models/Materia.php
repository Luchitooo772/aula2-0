<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'docente_id'];

    public function docente() {
        return $this->belongsTo(Docente::class);
    }

    public function reservas() {
        return $this->hasMany(Reserva::class);
    }
}
