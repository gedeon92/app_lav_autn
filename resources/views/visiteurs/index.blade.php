<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Visiteurs') }}
        </h2>
    </x-slot>

    <div class="container py-6">
        <a href="{{ route('visiteurs.create') }}" class="btn btn-primary mb-4">Ajouter un Visiteur</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Naissance</th>
                    <th>Lieu</th>
                    <th>Sexe</th>
                    <th>Fonction</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visiteurs as $visiteur)
                    <tr>
                        <td>{{ $visiteur->Nom }}</td>
                        <td>{{ $visiteur->Prénom }}</td>
                        <td>{{ $visiteur->Naiss }}</td>
                        <td>{{ $visiteur->Lieu }}</td>
                        <td>{{ $visiteur->Sexe }}</td>
                        <td>{{ $visiteur->fonction }}</td>
                        <td>{{ $visiteur->mail }}</td>
                        <td>
                            <a href="{{ route('visiteurs.edit', $visiteur->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('visiteurs.destroy', $visiteur->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800">Retour à la Dashboard</a>
        </div>
    </div>

    <style>
        body {
            background-color: rgba(0, 0, 0, 0.8); /* Couleur de fond sombre */
            color: #333; /* Couleur de texte sombre */
        }
        .container {
            max-width: 1100px; /* Largeur maximale pour le conteneur */
            margin: auto; /* Centrer le conteneur */
            padding: 20px;
            background: white; /* Fond blanc pour le conteneur */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }
        h2 {
            text-align: center; /* Centrer le titre */
            margin-bottom: 20px; /* Espacement sous le titre */
        }
        .table {
            width:  1000px; /* Full width */
            margin-top: 0px; /* Espacement au-dessus du tableau */
            border-collapse: collapse; /* Écraser les bordures */
        }
        .table th, .table td {
            padding: 10px; /* Espacement interne */
            text-align: left; /* Alignement à gauche */
            border-bottom: 1px solid #ddd; /* Bordure en bas */
        }
        .table th {
            background-color: #f2f2f2; /* Couleur de fond pour l'en-tête */
        }
        .table tr:hover {
            background-color: #f5f5f5; /* Changement de couleur au survol */
        }
        .btn {
            padding: 8px 12px; /* Espacement interne pour les boutons */
            border-radius: 5px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            color: white; /* Couleur de texte blanche */
            cursor: pointer; /* Curseur sur les boutons */
        }
        .btn-primary {
            background-color: #007bff; /* Couleur primaire */
        }
        .btn-warning {
            background-color: #ffc107; /* Couleur d'avertissement */
            color: #212529; /* Couleur de texte sombre pour le bouton */
        }
        .btn-danger {
            background-color: #dc3545; /* Couleur de danger */
        }
        .btn-primary:hover, .btn-warning:hover, .btn-danger:hover {
            opacity: 0.9; /* Légère transparence au survol */
        }
    </style>
</x-app-layout>