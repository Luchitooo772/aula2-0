<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'capacidad'];

    public function reservas() {
        return $this->hasMany(Reserva::class);
    }

    public function muebles() {
        return $this->hasMany(Mueble::class);
    }

    public function focos() {
        return $this->hasMany(Foco::class);
    }

    public function airesAcondicionados() {
        return $this->hasMany(AireAcondicionado::class);
    }

    public function cortinas() {
        return $this->hasMany(Cortina::class);
    }
}
