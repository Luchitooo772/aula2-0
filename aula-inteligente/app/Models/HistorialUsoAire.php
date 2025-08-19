<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialUsoAire extends Model
{
    use HasFactory;

    protected $fillable = ['aire_acondicionado_id', 'estado', 'temperatura', 'fecha'];

    public function aireAcondicionado() {
        return $this->belongsTo(AireAcondicionado::class);
    }
}
