<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Détails de la Formation</h4>
                        <a href="{{ url('formation') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Retour
                        </a>
                    </div>
                    <div class="p-4">
                        <div class="mb-3">
                            <label class="font-semibold">Nom :</label>
                            <p class="text-gray-700">{{ $formation->nom }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="font-semibold">Type :</label>
                            <p class="text-gray-700">{{ $formation->type_formation }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="font-semibold">Date :</label>
                            <p class="text-gray-700">{{ $formation->date_formation }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="font-semibold">Certification :</label>
                            <p class="text-gray-700">{{ $formation->certification ?? 'Non spécifiée' }}</p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
