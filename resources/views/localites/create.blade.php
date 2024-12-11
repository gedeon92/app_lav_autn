<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Ajouter une nouvelle Localité') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <!-- Formulaire d'ajout de Localité -->
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form action="{{ route('localites.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="Nomloc" class="text-sm font-medium text-gray-700">Nom de la Localité</label>
                    <input type="text" name="Nomloc" id="Nomloc" class="form-control" required>
                </div>

                <div class="form-group mb-4">
                    <label for="Superficie" class="text-sm font-medium text-gray-700">Superficie (en m²)</label>
                    <input type="number" name="Superficie" id="Superficie" class="form-control" required>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <!-- Bouton Ajouter -->
                    <button type="submit" class="btn btn-add">
                        Ajouter
                    </button>
                    <!-- Bouton Retour -->
                    <a href="{{ route('localites.index') }}" class="btn btn-return">
                        Annuler
                    </a>
                </div>
            </form>
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
        }

        .bg-white {
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

        .btn {
            padding: 10px 15px; /* Espacement interne pour les boutons */
            border-radius: 5px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            color: white; /* Couleur de texte blanche */
            cursor: pointer; /* Curseur sur les boutons */
            display: inline-block; /* Pour le style */
            margin-top: 10px; /* Espacement supérieur */
        }

        .btn-add {
            background-color: #28a745; /* Couleur de fond pour le bouton Ajouter */
        }

        .btn-add:hover {
            background-color: #218838; /* Couleur au survol */
        }

        .btn-return {
            color: #47524a; /* Couleur du lien Retour */
        }

        .btn-return:hover {
            color: #2b6cb0; /* Couleur au survol */
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px; /* Réduire l'espacement sur les petits écrans */
            }
        }
    </style>
</x-app-layout>