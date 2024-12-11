<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Modifier Localité') }}
        </h2>
    </x-slot>

    <div class="container py-6">
        <form action="{{ route('localites.update', $localite->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group mb-4">
                <label for="Nomloc">Nom de la Localité</label>
                <input type="text" id="Nomloc" name="Nomloc" value="{{ old('Nomloc', $localite->Nomloc) }}" class="form-control" required>
            </div>

            <div class="form-group mb-4">
                <label for="Superficie">Superficie</label>
                <input type="number" id="Superficie" name="Superficie" value="{{ old('Superficie', $localite->Superficie) }}" class="form-control" required>
            </div>

            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <a href="{{ route('localites.index') }}" class="btn btn-return">
                    Annuler
                </a>
            </div>
        </form>
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
            background: white; /* Fond blanc pour le conteneur */
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

        .btn {
            padding: 10px 15px; /* Espacement interne pour les boutons */
            border-radius: 5px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            color: white; /* Couleur de texte blanche */
            cursor: pointer; /* Curseur sur les boutons */
            display: inline-block; /* Pour le style */
            margin-top: 10px; /* Espacement supérieur */
        }

        .btn-success {
            background-color: #28a745; /* Couleur de succès */
        }

        .btn-success:hover {
            background-color: #218838; /* Couleur au survol */
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px; /* Réduire l'espacement sur les petits écrans */
            }
        }

        .btn-return {
            color: #47524a; /* Couleur du lien Retour */
        }
    </style>
</x-app-layout>