<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = ['descripcion', 'ubicacion','fecha'];

    public function invitados(): HasMany
    {
        return $this->hasMany(Invitado::class)->only('id','asistio','correo');
    }

}
