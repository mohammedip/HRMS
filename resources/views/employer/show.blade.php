<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">employer Details</h4>
                        <a href="{{ url('employer') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Back home
                        </a>
                    </div>
                    <div class="p-4">
                        <div class="mb-3">
                            <p><strong>Name:</strong> {{$employer->name}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Email:</strong> {{$employer->email}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Phone:</strong> {{$employer->telephone}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Birth Date:</strong> {{$employer->date_naissance}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Address:</strong> {{$employer->adresse}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Recruitment Date:</strong> {{$employer->date_recrutement}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Contract Type:</strong> {{$employer->type_contrat}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Salary:</strong> {{$employer->salaire}} $</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Status:</strong> {{$employer->statut}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Department:</strong> {{$employer->department->nom}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Role:</strong> {{$employer->role->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
