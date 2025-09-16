<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'docente_id',
        'horario',
        'dias',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    
    // Nueva relación de muchos a muchos con Aula
    public function aulas()
    {
        return $this->belongsToMany(Aula::class);
    }
}