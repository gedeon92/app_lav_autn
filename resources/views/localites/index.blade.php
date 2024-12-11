<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Liste des Localités') }}
        </h2>
    </x-slot>

    <div class="container py-6">
        <!-- Bouton Ajouter une Localité aligné à gauche -->
        <div class="mb-4">
            <a href="{{ route('localites.create') }}" class="btn btn-primary px-6 py-2">
                Ajouter une Localité
            </a>
        </div>

        <!-- Table des Localités -->
        <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left text-gray-600">ID</th>
                        <th class="text-left text-gray-600">Nom</th>
                        <th class="text-left text-gray-600">Superficie</th>
                        <th class="text-left text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($localites as $localite)
                        <tr class="border-b">
                            <td class="text-gray-800">{{ $localite->id }}</td>
                            <td class="text-gray-800">{{ $localite->Nomloc }}</td>
                            <td class="text-gray-800">{{ $localite->Superficie }}</td>
                            <td>
                                <a href="{{ route('localites.edit', $localite->id) }}" class="btn btn-warning btn-sm">
                                    Modifier
                                </a>
                                <form action="{{ route('localites.destroy', $localite->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette localité ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bouton Retour à la Dashboard aligné à gauche -->
        <div class="mt-4">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800">Retour à la Dashboard</a>
        </div>
    </div>

    <style>
        body {
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.8), rgba(0, 123, 255, 0.5)); /* Fond noir flouté avec mélange de bleu */
            color: #333; /* Couleur de texte sombre */
            backdrop-filter: blur(5px); /* Flou de fond */
            height: 100vh; /* Hauteur de la vue */
            margin: 0; /* Supprimer les marges */
        }

        .container {
            max-width: 800px; /* Largeur maximale du conteneur */
            margin: auto; /* Centrer le conteneur */
            padding: 20px; /* Espacement intérieur */
            background: rgba(255, 255, 255, 0.9); /* Fond blanc semi-transparent pour le conteneur */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        .btn {
            padding: 10px 15px; /* Espacement interne pour les boutons */
            border-radius: 5px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            cursor: pointer; /* Curseur sur les boutons */
            display: inline-block; /* Pour le style */
        }

        .btn-primary {
            background-color:  #007bff; /* Couleur de fond pour le bouton principal */
            color: white; /* Couleur de texte blanche */
        }

        .btn-primary:hover {
            background-color:  #0056b3; /* Couleur au survol */
        }

        .btn-warning {
            background-color: #f8f84a; /* Couleur de fond pour le bouton de modification */
            color: #d69e2e; /* Couleur de texte */
        }

        .btn-warning:hover {
            background-color: #ecc94b; /* Couleur au survol */
        }

        .btn-danger {
            background-color: #e53e3e; /* Couleur de fond pour le bouton de suppression */
            color: white; /* Couleur de texte blanche */
        }

        .btn-danger:hover {
            background-color: #c53030; /* Couleur au survol */
        }

        table {
            width: 100%; /* Table pleine largeur */
            border-collapse: collapse; /* Fusionner les bordures */
            margin-top: 20px; /* Espacement supérieur */
        }

        th, td {
            padding: 12px; /* Espacement des cellules */
            text-align: left; /* Alignement à gauche */
            border-bottom: 1px solid #e2e8f0; /* Bordure inférieure */
        }

        th {
            background-color: #edf2f7; /* Couleur de fond pour l'en-tête */
            color: #4a5568; /* Couleur de texte pour l'en-tête */
        }

        tr:hover {
            background-color: #f7fafc; /* Couleur de fond au survol de ligne */
        }

        .text-blue-600 {
            color: #4e5052; /* Couleur du lien */
        }

        .text-blue-600:hover {
            color: #2b6cb0; /* Couleur au survol */
        }
    </style>
</x-app-layout>