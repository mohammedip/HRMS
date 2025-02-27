<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Add employer</h4>
                        <a href="{{ url('employer') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Back home
                        </a>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('employer.store') }}" method="POST">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Telephone -->
                            <div class="mb-3">
                                <label for="telephone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="telephone" id="telephone"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('telephone') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Birth Date -->
                            <div class="mb-3">
                                <label for="date_naissance" class="block text-sm font-medium text-gray-700">Birth Date</label>
                                <input type="date" name="date_naissance" id="date_naissance"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('date_naissance') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="adresse" class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" name="adresse" id="adresse"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('adresse') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Recruitment Date -->
                            <div class="mb-3">
                                <label for="date_recrutement" class="block text-sm font-medium text-gray-700">Recruitment Date</label>
                                <input type="date" name="date_recrutement" id="date_recrutement"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('date_recrutement') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Contract Type -->
                            <div class="mb-3">
                                <label for="type_contrat" class="block text-sm font-medium text-gray-700">Contract Type</label>
                                <select name="type_contrat" id="type_contrat"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="CDI">CDI</option>
                                    <option value="CDD">CDD</option>
                                    <option value="Freelance">Freelance</option>
                                </select>
                                @error('type_contrat') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Salary -->
                            <div class="mb-3">
                                <label for="salaire" class="block text-sm font-medium text-gray-700">Salary</label>
                                <input type="number" name="salaire" id="salaire" step="0.01"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('salaire') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="statut" class="block text-sm font-medium text-gray-700">Status</label>
                                <select name="statut" id="statut"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="actif">Active</option>
                                    <option value="inactif">Inactive</option>
                                </select>
                                @error('statut') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Department -->
                            <div class="mb-3">
                                <label for="department_id" class="block text-sm font-medium text-gray-700">Department</label>
                                <select name="department_id" id="department_id"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->nom }}</option>
                                    @endforeach
                                </select>
                                @error('department_id') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                                <select name="role_id" id="role_id"
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
