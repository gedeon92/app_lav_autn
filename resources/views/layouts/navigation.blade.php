<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('demandes.index')" :active="request()->routeIs('demandes.index')">
                        Gérer une Demande
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('localites.index')" :active="request()->routeIs('localites.index')">
                        Gérer une Localité
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('visiteurs.index')" :active="request()->routeIs('visiteurs.index')">
                        Gérer un Visiteur
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Image Section -->
<div class="max-w-7xl mx-auto py-4">
    <img src="{{ asset('layout/kk.jpg') }}" alt="Description de l'image" class="w-full h-auto" />
</div>

<footer class="bg-gray-800 text-white mt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between">
            <div>
                <p class="text-sm">© {{ date('Y') }} Votre Société. Tous droits réservés.</p>
            </div>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-300">Politique de confidentialité</a>
                <a href="#" class="text-gray-400 hover:text-gray-300">Conditions d'utilisation</a>
                <a href="#" class="text-gray-400 hover:text-gray-300">Aide</a>
            </div>
        </div>
    </div>
</footer>