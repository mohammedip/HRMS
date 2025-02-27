<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Ajouter un Département</h4>
                        <a href="{{ url('department') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Retour
                        </a>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('department.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nom" class="block font-medium">Nom du Département</label>
                                <input type="text" name="nom" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('nom') <span class="text-red-500">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="block font-medium">Description</label>
                                <input type="text" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('description') <span class="text-red-500">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="manager_id" class="block font-medium">Responsable du Département</label>
                                <select name="manager_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled selected>Sélectionner un Manager</option>
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                    @endforeach
                                </select>
                                @error('manager_id') <span class="text-red-500">{{$message}}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                                    Enregistrer
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
