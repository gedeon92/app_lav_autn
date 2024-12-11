<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;
use App\Models\Localite;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    public function index()
    {
        $visiteurs = Visiteur::with('localite')->get();
        return view('visiteurs.index', compact('visiteurs'));
    }

    public function create()
    {
        $localites = Localite::all();

        return view('visiteurs.create', compact('localites'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'Nom' => 'required|string|max:255',
        'Prénom' => 'required|string|max:255',
        'Naiss' => 'required|date',
        'Lieu' => 'required|string|max:255',
        'Sexe' => 'required|string',
        'diplôme' => 'required|string|max:255',
        'fonction' => 'required|string|max:255',
        'tel' => 'required|string|max:15',
        'mail' => 'required|email|max:255',
        'idlocalite' => 'required|exists:localites,id',
    ]);

    // Si validation réussie, enregistrer
    Visiteur::create($validated);
    return redirect()->route('visiteurs.index')->with('success', 'Visiteur ajouté avec succès.');
}


    public function edit($id)
    {
        $visiteur = Visiteur::findOrFail($id);
        $localites = Localite::all();
        return view('visiteurs.edit', compact('visiteur', 'localites'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Prénom' => 'required|string|max:255',
            'Naiss' => 'required|date',
            'Lieu' => 'required|string|max:255',
            'Sexe' => 'required|in:Homme,Femme',
            'diplôme' => 'required|string|max:255',
            'fonction' => 'required|string|max:255',
            'tel' => 'required|string|max:15',
            'mail' => 'required|email|max:255',
            'idlocalite' => 'required|exists:localites,id',
        ]);
    
        $visiteur = Visiteur::findOrFail($id);
    
        $visiteur->update([
            'Nom' => $request->Nom,
            'Prénom' => $request->Prénom,
            'Naiss' => $request->Naiss,
            'Lieu' => $request->Lieu,
            'Sexe' => $request->Sexe,
            'diplôme' => $request->diplôme,
            'fonction' => $request->fonction,
            'tel' => $request->tel,
            'mail' => $request->mail,
            'idlocalite' => $request->idlocalite,
        ]);
    
        return redirect()->route('visiteurs.index')->with('success', 'Le visiteur a été mis à jour avec succès.');
    }
    
    public function destroy($id)
    {
        $visiteur = Visiteur::findOrFail($id);
        $visiteur->delete();
        return redirect()->route('visiteurs.index')->with('success', 'Visiteur supprimé.');
    }
}

