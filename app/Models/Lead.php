<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    // Indica qué campos del modelo pueden ser llenados mediante asignación en masa
    protected $fillable = ['name', 'email', 'phone', 'score'];

    // Define una relación uno a uno con el modelo Client
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
