<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Department Details</h4>
                        <a href="{{ url('department') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Back home
                        </a>
                    </div>
                    <div class="p-4">
                        <div class="mb-3">
                            <p><strong>Name:</strong> {{ $department->nom }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Description:</strong> {{ $department->description }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Responsable:</strong> {{ $department->responsable->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
