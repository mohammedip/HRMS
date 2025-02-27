<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Update Department</h4>
                        <a href="{{ url('department') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Back home
                        </a>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('department.update', $department->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Name Field -->
                            <div class="mb-3">
                                <label for="nom" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="nom" id="nom" value="{{ $department->nom }}" 
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('nom') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Description Field -->
                            <div class="mb-3">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="3" 
                                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $department->description }}</textarea>
                                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Responsable Dropdown -->
                            <div class="mb-3">
                                <label for="responsable_id" class="block text-sm font-medium text-gray-700">Responsable</label>
                                <select name="responsable_id" id="responsable_id"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select a Responsable</option>
                                    @foreach($managers as $manager)
                                        <option value="{{ $manager->id }}" {{ $manager->id == $department->responsable_id ? 'selected' : '' }}>
                                        {{ $manager->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('responsable_id') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
