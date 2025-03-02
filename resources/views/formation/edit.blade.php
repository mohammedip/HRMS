<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Modifier une Formation</h4>
                        <a href="{{ url('formation') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Retour
                        </a>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('formation.update', $formation->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nom" class="block text-gray-700">Nom de la formation</label>
                                <input type="text" name="nom" value="{{ $formation->nom }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('nom') <span class="text-red-500">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date_formation" class="block text-gray-700">Date de la formation</label>
                                <input type="date" name="date_formation" value="{{ $formation->date_formation }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('date_formation') <span class="text-red-500">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="type_formation" class="block text-gray-700">Type de formation</label>
                                <input type="text" name="type_formation" value="{{ $formation->type_formation }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('type_formation') <span class="text-red-500">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="certification" class="block text-gray-700">Certification (si applicable)</label>
                                <input type="text" name="certification" value="{{ $formation->certification }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('certification') <span class="text-red-500">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">Mettre à jour</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
