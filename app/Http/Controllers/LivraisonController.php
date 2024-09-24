<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\benevole;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    // Afficher la liste des livraisons
    public function index()
    {
        $livraisons = Livraison::with('benevole')->get();
        return view('livraisons.index', compact('livraisons'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $benevoles = Benevole::all();
        return view('livraisons.create', compact('benevoles'));
    }

    // Enregistrer une nouvelle livraison
    public function store(Request $request)
    {
        $request->validate([
            'date_livraison' => 'required|date',
            'adresse_livraison' => 'required|string|max:255',
            'status' => 'required|in:EN_COURS,TERMINEE,ANNULEE',
            'benevole_id' => 'required|exists:benevole,id',
        ]);

        Livraison::create($request->all());

        return redirect()->route('livraisons.index')->with('success', 'Livraison créée avec succès.');
    }

    // Afficher les détails d'une livraison spécifique
    public function show(Livraison $livraison)
    {
        return view('livraisons.show', compact('livraison'));
    }

    // Afficher le formulaire d'édition
    public function edit(Livraison $livraison)
    {
        $benevoles = Benevole::all();
        return view('livraisons.edit', compact('livraison', 'benevoles'));
    }

    // Mettre à jour une livraison existante
    public function update(Request $request, Livraison $livraison)
    {
        $request->validate([
            'date_livraison' => 'required|date',
            'adresse_livraison' => 'required|string|max:255',
            'status' => 'required|in:EN_COURS,TERMINEE,ANNULEE',
            'benevole_id' => 'required|exists:benevole,id',
        ]);

        $livraison->update($request->all());

        return redirect()->route('livraisons.index')->with('success', 'Livraison mise à jour avec succès.');
    }

    // Supprimer une livraison
    public function destroy(Livraison $livraison)
    {
        $livraison->delete();

        return redirect()->route('livraisons.index')->with('success', 'Livraison supprimée avec succès.');
    }
}
