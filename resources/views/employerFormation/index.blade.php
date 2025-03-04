<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-end mb-6">
            <a href="{{ route('employerFormation.create') }}" 
               class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">
                Ajouter une inscription
            </a>
        </div>

        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($formations as $formation)
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-6 w-full md:w-1/3 lg:w-1/4">
                    <h4 class="text-xl font-semibold text-gray-800 mb-3">{{ $formation->nom }}</h4>

                    @php
                        // Get all employers related to the current formation
                        $employers = $formation->employerFormations->pluck('employer');
                    @endphp

                    @if ($employers->isEmpty())
                        <p class="text-gray-500 text-sm">Aucun employé inscrit.</p>
                    @else
                        <ul class="text-gray-700 text-sm space-y-2">
                            @foreach ($employers as $employer)
                                <li class="bg-gray-100 p-2 rounded-md flex justify-between items-center">
                                    <span>{{ $employer->name }}</span>

                                    <!-- Form for deleting the inscription -->
                                    <form action="{{ route('employerFormation.destroy', [$employer->id, $formation->id]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white text-xs px-2 py-1 rounded hover:bg-red-600">Supprimer</button>
                                    </form>
                                  
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $inscriptions->links() }}
        </div>
    </div>
</x-app-layout>
