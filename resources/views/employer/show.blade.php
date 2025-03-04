<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Employer Details</h4>
                        <a href="{{ url('employer') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Back Home
                        </a>
                    </div>
                    <div class="p-4">
                        <!-- Employer Details -->
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
                            <p><strong>Department:</strong> {{$employer->department->nom ?? 'N/A'}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Role:</strong> {{$employer->role->name}}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Emploi:</strong> {{$employer->emploi->nom ?? 'N/A'}}</p>
                        </div>

                        <!-- Stages Bar -->
                        <h2 class="mt-6 text-lg font-semibold">Career </h2>
                        @if($employer->cursus->isEmpty())
                            <p>No cursus records available for this employer.</p>
                        @else
                            <div class="mt-4">
                                <!-- Stages Bar -->
                                <div class="flex space-x-2 mb-4">
                                    @foreach($employer->cursus as $index => $entry)
                                        <button class="stage-btn py-2 px-4 border-2 border-gray-300 rounded-full text-sm font-medium {{ $index == 0 ? 'bg-blue-500 text-white' : 'bg-gray-200' }}" data-id="{{ $index }}">
                                            {{ \Carbon\Carbon::parse($entry->created_at)->format('Y-m-d') }}
                                        </button>
                                    @endforeach
                                </div>

                                <!-- Data for clicked stage -->
                                <div id="stage-data" class="mt-6">
                                    @foreach($employer->cursus as $index => $entry)
                                        <div id="stage-{{ $index }}" class="stage-content {{ $index != 0 ? 'hidden' : '' }}">
                                            <div class="mb-3">
                                                <p><strong>Name:</strong> {{ $entry->name }}</p>
                                                <p><strong>Contract Type:</strong> {{ $entry->contract_type }}</p>
                                                <p><strong>Department:</strong> {{ $entry->department->nom ?? 'N/A' }}</p>
                                                <p><strong>Role:</strong> {{ $entry->role->name ?? 'N/A' }}</p>
                                                <p><strong>Emploi:</strong> {{ $entry->emploi->nom ?? 'N/A' }}</p>
                                                <p><strong>Grad:</strong> {{ $entry->grad ?? 'N/A' }}</p>
                                                <p><strong>Salaire:</strong> {{ $entry->salaire ?? 'N/A' }} $</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Interactivity -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stageBtns = document.querySelectorAll('.stage-btn');
            const stageContents = document.querySelectorAll('.stage-content');
            
            stageBtns.forEach((btn, index) => {
                btn.addEventListener('click', function() {
                    stageContents.forEach(content => content.classList.add('hidden'));

                    const content = document.getElementById(`stage-${index}`);
                    content.classList.remove('hidden');
                    
                    stageBtns.forEach(button => {
                button.classList.remove('bg-blue-500', 'text-white');  
                button.classList.add('bg-gray-200', 'text-black');   
                });

                btn.classList.remove('bg-gray-200', 'text-black');
                btn.classList.add('bg-blue-500', 'text-white');
                });
            });
        });
    </script>
</x-app-layout>
