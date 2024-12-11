<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Liste des demandes') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <!-- Bouton Ajouter une Demande aligné à gauche -->
        <div class="mb-4">
            <a href="{{ route('demandes.create') }}" class="btn-primary">
                Ajouter une Demande
            </a>
        </div>

        <!-- Table des demandes -->
        <div class="overflow-x-auto bg-white shadow-sm rounded-lg">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left text-gray-600">Objet</th>
                        <th class="px-4 py-2 text-left text-gray-600">Description</th>
                        <th class="px-4 py-2 text-left text-gray-600">Visiteur</th>
                        <th class="px-4 py-2 text-left text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($demandes as $demande)
                        <tr class="border-b">
                            <td class="px-4 py-2 text-gray-800">{{ $demande->objet }}</td>
                            <td class="px-4 py-2 text-gray-800">{{ $demande->description }}</td>
                            <td class="px-4 py-2 text-gray-800">{{ $demande->visiteur->Nom ?? 'Non défini' }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('demandes.edit', $demande->id) }}" class="btn btn-warning btn-sm">
                                    Modifier
                                </a>
                                <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                <a href="{{ route('dashboard') }}" class="text-black hover:text-gray-600">Retour à la Dashboard</a>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: rgba(240, 240, 240, 1); /* Couleur de fond légère */
            color: #333; /* Couleur de texte sombre */
        }

        .container {
            max-width: 800px; /* Largeur maximale du conteneur */
            margin: auto; /* Centrer le conteneur */
            padding: 20px; /* Espacement intérieur */
        }

        .bg-white {
            background: white; /* Fond blanc pour le tableau */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        .btn {
            padding: 8px 12px; /* Espacement interne pour les boutons */
            border-radius: 5px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            cursor: pointer; /* Curseur sur les boutons */
            display: inline-block; /* Pour le style */
            margin-top: 5px; /* Espacement supérieur */
        }

        .btn-warning {
            background-color: #f6e05e; /* Couleur de fond pour le bouton Modifier */
            color: #d69e2e; /* Couleur de texte */
        }

        .btn-warning:hover {
            background-color: #ecc94b; /* Couleur au survol */
        }

        .btn-danger {
            background-color: #e53e3e; /* Couleur de fond pour le bouton Supprimer */
            color: white; /* Couleur de texte blanche */
        }

        .btn-danger:hover {
            background-color: #c53030; /* Couleur au survol */
        }

        .btn-primary {
            background-color: #007bff; /* Couleur de fond pour le bouton principal */
            color: white; /* Couleur de texte blanche */
            padding: 8px 12px; /* Espacement interne pour le bouton */
            border-radius: 5px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            cursor: pointer; /* Curseur sur les boutons */
            display: inline-block; /* Pour le style */
            transition: background-color 0.3s; /* Transition pour un effet au survol */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Couleur au survol */
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

        .overflow-x-auto {
            overflow-x: auto; /* Permet le défilement horizontal si nécessaire */
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px; /* Réduire l'espacement sur les petits écrans */
            }

            th, td {
                padding: 8px; /* Réduire le padding sur les petits écrans */
            }
        }
    </style>
</x-app-layout>