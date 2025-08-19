<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialFoco extends Model
{
    use HasFactory;

    protected $fillable = ['foco_id', 'estado', 'fecha'];

    public function foco() {
        return $this->belongsTo(Foco::class);
    }
}
