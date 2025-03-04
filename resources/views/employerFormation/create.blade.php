<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-1/2 lg:w-1/3 bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                
                <!-- Affichage des messages de succès -->
                @if(session('status'))
                    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <h4 class="text-xl font-semibold mb-4">Associer un employé à une formation</h4>

                <!-- Formulaire d'association -->
                <form action="{{ route('employerFormation.store') }}" method="POST">
                    @csrf

                    <!-- Sélection de l'employé -->
                    <div class="mb-4">
                        <label for="employer_id" class="block text-sm font-medium text-gray-700">Employé</label>
                        <select name="employer_id" id="employer_id" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="">Sélectionner un employé</option>
                            @foreach ($employers as $employer)
                                <option value="{{ $employer->id }}">{{ $employer->name }}</option>
                            @endforeach
                        </select>
                        @error('employer_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sélection de la formation -->
                    <div class="mb-4">
                        <label for="formation_id" class="block text-sm font-medium text-gray-700">Formation</label>
                        <select name="formation_id" id="formation_id" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="">Sélectionner une formation</option>
                            @foreach ($formations as $formation)
                                <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                            @endforeach
                        </select>
                        @error('formation_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Associer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
