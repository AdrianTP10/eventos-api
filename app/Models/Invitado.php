<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitado extends Model
{
    use HasFactory;


    
    protected $table = 'invitados';

    protected $fillable = ['evento_id', 'correo'];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}
