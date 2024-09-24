<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    // Nom de la table associée
    protected $table = 'livraison';

    // Déclaration des attributs qui peuvent être assignés en masse
    protected $fillable = [
        'date_livraison',
        'adresse_livraison',
        'status',
        'benevole_id', // Clé étrangère vers la table benevole
    ];

    // Déclaration de la relation avec le modèle Benevole
    public function benevole()
    {
        return $this->belongsTo(Benevole::class, 'benevole_id');
    }
}
