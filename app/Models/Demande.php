<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $table = 'demandes';

    protected $fillable = ['objet', 'description', 'idVisiteurs'];

    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'idVisiteurs');
    }
}

