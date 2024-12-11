<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;

    protected $table = 'visiteurs';

    protected $fillable = [
        'Nom', 'Prénom', 'Naiss', 'Lieu', 'Sexe', 
        'diplôme', 'fonction', 'tel', 'mail', 'idlocalite'
    ];

    public function localite()
    {
        return $this->belongsTo(Localite::class, 'idlocalite');
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class, 'idVisiteurs');
    }
}

