<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Visiteur;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = Demande::with('visiteur')->get();
        return view('demandes.index', compact('demandes'));
    }

    public function create()
    {
        $visiteurs = Visiteur::all();
        return view('demandes.create', compact('visiteurs'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'objet' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'idVisiteurs' => 'required|exists:visiteurs,id',
        ]);
    
        // Création de la demande
        $demande = new Demande();
        $demande->objet = $request->objet;
        $demande->description = $request->description;
        $demande->idVisiteurs = $request->idVisiteurs;
        $demande->save();
    
        // Redirection avec un message de succès
        return redirect()->route('demandes.index')->with('success', 'Demande ajoutée avec succès.');
    }
    

    public function edit($id)
    {
        $demande = Demande::findOrFail($id);
        $visiteurs = Visiteur::all();
        return view('demandes.edit', compact('demande', 'visiteurs'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'objet' => 'required|string|max:255',
            'description' => 'required|string',
            'idVisiteurs' => 'required|exists:visiteurs,id',
        ]);

        $demande = Demande::findOrFail($id);
        $demande->update($validated);
        return redirect()->route('demandes.index')->with('success', 'Demande mise à jour.');
    }

    public function destroy($id)
    {
        $demande = Demande::findOrFail($id);
        $demande->delete();
        return redirect()->route('demandes.index')->with('success', 'Demande supprimée.');
    }
}
