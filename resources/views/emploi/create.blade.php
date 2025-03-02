<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Ajouter un Emploi</h4>
                        <a href="{{ url('emploi') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Retour
                        </a>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('emploi.store') }}" method="POST">
                            @csrf

                            <!-- Nom de l'emploi -->
                            <div class="mb-3">
                                <label for="nom" class="block text-gray-700">Nom de l'emploi</label>
                                <input type="text" name="nom" value="{{ old('nom') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('nom') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Sélection du département -->
                            <div class="mb-3">
                                <label for="department_id" class="block text-gray-700">Département</label>
                                <select name="department_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Sélectionner un département</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">Enregistrer</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
