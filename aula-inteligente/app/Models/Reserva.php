<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['aula_id', 'materia_id', 'fecha', 'hora_inicio', 'hora_fin'];

    public function aula() {
        return $this->belongsTo(Aula::class);
    }

    public function materia() {
        return $this->belongsTo(Materia::class);
    }
}
