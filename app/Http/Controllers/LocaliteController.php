<?php

namespace App\Http\Controllers;

use App\Models\Localite;
use Illuminate\Http\Request;

class LocaliteController extends Controller
{
    public function index()
    {
        $localites = Localite::all();
        return view('localites.index', compact('localites'));
    }

    public function create()
    {
        return view('localites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nomloc' => 'required|string',
            'Superficie' => 'required|numeric',
        ]);

        Localite::create($validated);
        return redirect()->route('localites.index')->with('success', 'Localité créée avec succès.');
    }

    public function edit($id)
    {
        $localite = Localite::findOrFail($id);
        return view('localites.edit', compact('localite'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Nomloc' => 'required|string',
            'Superficie' => 'required|numeric',
        ]);

        $localite = Localite::findOrFail($id);
        $localite->update($validated);
        return redirect()->route('localites.index')->with('success', 'Localité mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $localite = Localite::findOrFail($id);
        $localite->delete();
        return redirect()->route('localites.index')->with('success', 'Localité supprimée.');
    }
}

