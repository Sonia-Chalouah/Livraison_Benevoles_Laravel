<?php

namespace App\Http\Controllers;

use App\Models\benevole;
use Illuminate\Http\Request;

class BenevoleController extends Controller
{
    // Afficher la liste des bénévoles
    public function index()
{
    // Récupérer tous les bénévoles
    $benevoles = Benevole::all();

    // Retourner la vue avec les bénévoles
    return view('benevoles.index', compact('benevoles'));
}

    // Afficher le formulaire de création
    public function create()
    {
        return view('benevoles.create');
    }

    // Enregistrer un nouveau bénévole
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);
    
        // Création d'un nouveau bénévole
        Benevole::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'adresse' => $request->input('adresse'),
        ]);
    
        // Redirection vers la page d'index des bénévoles avec un message de succès
        return redirect()->route('benevoles.index')->with('success', 'Bénévole créé avec succès !');
    }

    // Afficher les détails d'un bénévole spécifique
    public function show(Benevole $benevole)
    {
        return view('benevoles.show', compact('benevole'));
    }

    // Afficher le formulaire d'édition
    public function edit(Benevole $benevole)
    {
        return view('benevoles.edit', compact('benevole'));
    }

    // Mettre à jour un bénévole existant
    public function update(Request $request, Benevole $benevole)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        $benevole->update($request->all());

        return redirect()->route('benevoles.index')->with('success', 'Bénévole mis à jour avec succès.');
    }

    // Supprimer un bénévole
    public function destroy(Benevole $benevole)
    {
        $benevole->delete();

        return redirect()->route('benevoles.index')->with('success', 'Bénévole supprimé avec succès.');
    }
}
