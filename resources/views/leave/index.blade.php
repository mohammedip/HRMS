<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-3/4 xl:w-4/5">
                @if(session('status'))
                    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">

                    <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-6">
                        <h5 class="text-lg font-medium text-gray-900">Leave Sold</h5>
                        <p class="text-xl font-semibold text-gray-800 mt-2">{{ $employer->leave_sold }} days</p>
                    </div>


                    <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-6">
                        <div class="flex justify-between items-center">
                            <div>
                                <h5 class="text-lg font-medium text-gray-900">Extra Time</h5>
                                <p class="text-xl font-semibold text-gray-800 mt-2">{{ $employer->extra_time }} days</p>
                            </div>
                            
                            <a href="{{--{{ route('employer.extractExtraTime', $employer->id) }}--}}" 
                                class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 focus:outline-none">
                                 Demande du recuperation
                             </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-gray-900 shadow-lg rounded-lg overflow-y-auto p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Liste des Congés</h4>
                        <a href="{{ route('leave.create') }}" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">
                            Demander un Congé
                        </a>
                    </div>
                    <div class="mt-2 overflow-x-auto">
                        @if($leaves->isEmpty())
                            <div class="p-4 text-center text-gray-500">
                                Aucune demande de congé trouvée.
                            </div>
                        @else
                            <table class="table-auto w-full min-w-max divide-y divide-gray-200 border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Id</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Date Début</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Date Fin</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Total des jours</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Raison</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Statut</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leaves as $leave)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $leave->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $leave->start_date }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $leave->end_date }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $leave->total_days }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $leave->reason }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900  ">
                                            <span class="@if($leave->statut == 'Pending') bg-yellow-500 
                                            @elseif($leave->statut == 'Approved') bg-green-500 
                                            @elseif($leave->statut == 'Rejected') bg-red-500 
                                            @endif 
                                            text-white font-semibold rounded-full px-3 py-2">{{ $leave->statut }}</span>
                                        </td>
                                        
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <form action="{{ route('leave.destroy', $leave->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-700">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
