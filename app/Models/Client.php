<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Define la relación con Lead
    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}
