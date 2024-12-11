<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Ajouter une Demande') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <form action="{{ route('demandes.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Champ Objet -->
            <div class="form-group">
                <label for="objet" class="text-lg font-medium">Objet</label>
                <input type="text" name="objet" id="objet" class="form-control" required>
            </div>

            <!-- Champ Description -->
            <div class="form-group">
                <label for="description" class="text-lg font-medium">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <!-- Sélection Visiteur -->
            <div class="form-group">
                <label for="visiteur" class="text-lg font-medium">Visiteur</label>
                <select name="idVisiteurs" id="visiteur" class="form-control" required>
                    @foreach($visiteurs as $visiteur)
                        <option value="{{ $visiteur->id }}">{{ $visiteur->Nom }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Bouton Ajouter -->
            <div>
                <button type="submit">
                    Ajouter la Demande
                </button>
            </div>
        </form>

        <!-- Bouton Retour -->
        <div class="mt-4">
            <a href="{{ route('demandes.index') }}" class="text-blue-600 hover:text-blue-800">Annuler</a>
        </div>
    </div>
    <style>
        body {
            background-color: rgba(240, 240, 240, 1); /* Couleur de fond légère */
            color: #333; /* Couleur de texte sombre */
        }

        .container {
            max-width: 600px; /* Largeur maximale du conteneur */
            margin: auto; /* Centrer le conteneur */
            padding: 20px; /* Espacement intérieur */
            background: white; /* Fond blanc pour le formulaire */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        .form-group {
            margin-bottom: 1.5rem; /* Espacement entre les groupes de champs */
        }

        label {
            display: block; /* Afficher le label en bloc */
            margin-bottom: 0.5rem; /* Espacement sous le label */
            font-weight: bold; /* Mettre le label en gras */
            color: #4a5568; /* Couleur du texte du label */
        }

        .form-control {
            width: 100%; /* Largeur complète */
            padding: 10px; /* Espacement intérieur */
            border: 1px solid #ced4da; /* Bordure grise */
            border-radius: 5px; /* Coins arrondis */
            box-sizing: border-box; /* Inclure le padding dans la largeur */
            font-size: 1rem; /* Taille de police normale */
        }

        .form-control:focus {
            border-color: #3182ce; /* Bordure bleue au focus */
            outline: none; /* Retirer le contour par défaut */
            box-shadow: 0 0 5px rgba(49, 130, 206, 0.5); /* Ombre au focus */
        }

        button {
            padding: 10px 15px; /* Espacement interne pour le bouton */
            border-radius: 5px; /* Coins arrondis */
            background-color: #4caf50; /* Couleur de fond pour le bouton Ajouter */
            color: white; /* Couleur de texte blanche */
            border: none; /* Pas de bordure */
            cursor: pointer; /* Curseur sur le bouton */
            font-size: 1rem; /* Taille de police normale */
            transition: background-color 0.3s; /* Transition douce pour le hover */
        }

        button:hover {
            background-color: #45a049; /* Couleur au survol */
        }

        .text-blue-600 {
            color: #3182ce; /* Couleur du lien */
        }

        .text-blue-600:hover {
            color: #2b6cb0; /* Couleur au survol */
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px; /* Réduire l'espacement sur les petits écrans */
            }
        }
    </style>
</x-app-layout>