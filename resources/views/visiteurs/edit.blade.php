<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un visiteur') }}
        </h2>
    </x-slot>

    <style>
        body {
            background-color: rgba(0, 0, 0, 0.8); /* Couleur de fond sombre */
            color: #333; /* Couleur de texte sombre */
        }

        .container {
            max-width: 600px; /* Largeur maximale pour le conteneur */
            margin: auto; /* Centrer le conteneur */
            padding: 20px;
            background: white; /* Fond blanc pour le formulaire */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        h2 {
            text-align: center; /* Centrer le titre */
            margin-bottom: 20px; /* Espacement sous le titre */
        }

        /* Alertes */
        .alert {
            padding: 15px; /* Espacement intérieur */
            border-radius: 5px; /* Coins arrondis */
            margin-bottom: 20px; /* Espacement inférieur */
        }

        /* Alertes de succès */
        .alert-success {
            background-color: #d4edda; /* Couleur de fond verte */
            color: #155724; /* Couleur du texte */
            border: 1px solid #c3e6cb; /* Bordure verte */
        }

        /* Alertes d'erreur */
        .alert-danger {
            background-color: #f8d7da; /* Couleur de fond rouge */
            color: #721c24; /* Couleur du texte */
            border: 1px solid #f5c6cb; /* Bordure rouge */
        }

        /* Champs de formulaire */
        .form-control {
            border-radius: 5px; /* Coins arrondis */
            border: 1px solid #ced4da; /* Bordure grise */
            padding: 10px; /* Espacement intérieur */
            width: 100%; /* Largeur complète */
            box-sizing: border-box; /* Inclure le padding dans la largeur */
        }

        /* Boutons */
        .btn {
            padding: 10px 15px; /* Espacement interne pour les boutons */
            border-radius: 5px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            color: white; /* Couleur de texte blanche */
            cursor: pointer; /* Curseur sur les boutons */
            margin-top: 10px; /* Espacement supérieur */
            display: inline-block; /* Pour le style */
        }

        .btn-success {
            background-color: #28a745; /* Couleur de succès */
        }

        .btn-success:hover {
            background-color: #218838; /* Couleur au survol */
        }

        .btn-secondary {
            background-color: #6c757d; /* Couleur secondaire */
        }

        .btn-secondary:hover {
            opacity: 0.9; /* Légère transparence au survol */
        }

        /* Espacement des éléments */
        .mb-3 {
            margin-bottom: 1rem; /* Espacement inférieur */
        }

        /* Réactivité */
        @media (max-width: 768px) {
            .container {
                padding: 10px; /* Réduire l'espacement sur les petits écrans */
            }
        }
    </style>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('visiteurs.update', $visiteur->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="Nom" class="text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="Nom" id="Nom" class="form-control" value="{{ old('Nom', $visiteur->Nom) }}" required>
            </div>
            <div class="mb-4">
                <label for="Prénom" class="text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" name="Prénom" id="Prénom" class="form-control" value="{{ old('Prénom', $visiteur->Prénom) }}" required>
            </div>
            <div class="mb-4">
                <label for="Naiss" class="text-sm font-medium text-gray-700">Date de Naissance</label>
                <input type="date" name="Naiss" id="Naiss" class="form-control" value="{{ old('Naiss', $visiteur->Naiss) }}" required>
            </div>
            <div class="mb-4">
                <label for="Lieu" class="text-sm font-medium text-gray-700">Lieu de Naissance</label>
                <input type="text" name="Lieu" id="Lieu" class="form-control" value="{{ old('Lieu', $visiteur->Lieu) }}" required>
            </div>
            <div class="mb-4">
                <label for="Sexe" class="text-sm font-medium text-gray-700">Sexe</label>
                <select name="Sexe" id="Sexe" class="form-control" required>
                    <option value="Homme" {{ old('Sexe', $visiteur->Sexe) == 'Homme' ? 'selected' : '' }}>Homme</option>
                    <option value="Femme" {{ old('Sexe', $visiteur->Sexe) == 'Femme' ? 'selected' : '' }}>Femme</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="diplôme" class="text-sm font-medium text-gray-700">Diplôme</label>
                <input type="text" name="diplôme" id="diplôme" class="form-control" value="{{ old('diplôme', $visiteur->diplôme) }}" required>
            </div>
            <div class="mb-4">
                <label for="fonction" class="text-sm font-medium text-gray-700">Fonction</label>
                <input type="text" name="fonction" id="fonction" class="form-control" value="{{ old('fonction', $visiteur->fonction) }}" required>
            </div>
            <div class="mb-4">
                <label for="tel" class="text-sm font-medium text-gray-700">Numéro de téléphone</label>
                <input type="text" name="tel" id="tel" class="form-control" value="{{ old('tel', $visiteur->tel) }}" required>
            </div>
            <div class="mb-4">
                <label for="mail" class="text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="mail" id="mail" class="form-control" value="{{ old('mail', $visiteur->mail) }}" required>
            </div>
            <div class="mb-4">
                <label for="idlocalite" class="text-sm font-medium text-gray-700">Localité</label>
                <select class="form-control" id="idlocalite" name="idlocalite" required>
                    <option value="">Choisir...</option>
                    @foreach($localites as $localite)
                        <option value="{{ $localite->id }}" {{ old('idlocalite', $visiteur->idlocalite) == $localite->id ? 'selected' : '' }}>
                            {{ $localite->Nomloc }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('visiteurs.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</x-app-layout>