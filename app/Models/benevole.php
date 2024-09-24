<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benevole extends Model
{
    use HasFactory;

    // Nom de la table associée
    protected $table = 'benevole';

    // Déclaration des attributs qui peuvent être assignés en masse
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
    ];

    // Déclaration de la relation avec le modèle Livraison
    public function livraisons()
    {
        return $this->hasMany(Livraison::class, 'benevole_id');
    }
}
