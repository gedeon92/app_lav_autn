<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Ajouter un nouveau Visiteur') }}
        </h2>
    </x-slot>

    <div class="container py-6 mx-auto">
        <!-- Formulaire -->
        <form action="{{ route('visiteurs.store') }}" method="POST" class="bg-white p-6 shadow-md rounded-lg">
            @csrf

            <!-- Nom -->
            <div class="mb-4">
                <label for="Nom" class="text-sm font-medium text-gray-700">Nom</label>
                <input type="text" class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('Nom') is-invalid @enderror" id="Nom" name="Nom" value="{{ old('Nom') }}" required>
            </div>

            <!-- Prénom -->
            <div class="mb-4">
                <label for="Prénom" class="text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('Prénom') is-invalid @enderror" id="Prénom" name="Prénom" value="{{ old('Prénom') }}" required>
            </div>

            <!-- Date de Naissance -->
            <div class="mb-4">
                <label for="Naiss" class="text-sm font-medium text-gray-700">Date de Naissance</label>
                <input type="date" class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('Naiss') is-invalid @enderror" id="Naiss" name="Naiss" value="{{ old('Naiss') }}" required>
            </div>

            <!-- Lieu de Naissance -->
            <div class="mb-4">
                <label for="Lieu" class="text-sm font-medium text-gray-700">Lieu de Naissance</label>
                <input type="text" class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('Lieu') is-invalid @enderror" id="Lieu" name="Lieu" value="{{ old('Lieu') }}" required>
            </div>

            <!-- Sexe -->
            <div class="mb-4">
                <label for="Sexe" class="text-sm font-medium text-gray-700">Sexe</label>
                <select class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('Sexe') is-invalid @enderror" id="Sexe" name="Sexe" required>
                    <option value="">Choisir...</option>
                    <option value="Homme" {{ old('Sexe') == 'Homme' ? 'selected' : '' }}>Homme</option>
                    <option value="Femme" {{ old('Sexe') == 'Femme' ? 'selected' : '' }}>Femme</option>
                </select>
            </div>

            <!-- Diplôme -->
            <div class="mb-4">
                <label for="diplôme" class="text-sm font-medium text-gray-700">Diplôme</label>
                <input type="text" class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('diplôme') is-invalid @enderror" id="diplôme" name="diplôme" value="{{ old('diplôme') }}" required>
            </div>

            <!-- Fonction -->
            <div class="mb-4">
                <label for="fonction" class="text-sm font-medium text-gray-700">Fonction</label>
                <input type="text" class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('fonction') is-invalid @enderror" id="fonction" name="fonction" value="{{ old('fonction') }}" required>
            </div>

            <!-- Téléphone -->
            <div class="mb-4">
                <label for="tel" class="text-sm font-medium text-gray-700">Téléphone</label>
                <input type="text" class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tel') is-invalid @enderror" id="tel" name="tel" value="{{ old('tel') }}" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="mail" class="text-sm font-medium text-gray-700">Email</label>
                <input type="email" class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('mail') is-invalid @enderror" id="mail" name="mail" value="{{ old('mail') }}" required>
            </div>

            <!-- Localité -->
            <div class="mb-4">
                <label for="idlocalite" class="text-sm font-medium text-gray-700">Localité</label>
                <select class="form-control mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500 @error('idlocalite') is-invalid @enderror" id="idlocalite" name="idlocalite" required>
                    <option value="">Choisir...</option>
                    @foreach($localites as $localite)
                        <option value="{{ $localite->id }}" {{ old('idlocalite') == $localite->id ? 'selected' : '' }}>
                            {{ $localite->Nomloc }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Boutons -->
            <div class="flex items-center justify-between mt-6">
                <!-- Bouton Enregistrer -->
                <button type="submit" class="btn btn-success px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Enregistrer
                </button>
                <!-- Bouton Annuler -->
                <a href="{{ route('visiteurs.index') }}" class="btn btn-secondary px-6 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Annuler
                </a>
            </div>
        </form>
    </div>

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

        .btn {
            padding: 10px 15px; /* Espacement interne pour les boutons */
            border-radius: 5px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            color: white; /* Couleur de texte blanche */
            cursor: pointer; /* Curseur sur les boutons */
        }

        .btn-success {
            background-color: #28a745; /* Couleur de succès */
        }

        .btn-secondary {
            background-color: #6c757d; /* Couleur secondaire */
        }

        .btn-success:hover, .btn-secondary:hover {
            opacity: 0.9; /* Légère transparence au survol */
        }
    </style>
</x-app-layout>