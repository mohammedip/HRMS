<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-3/4 xl:w-2/3 overflow-y-auto">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg overflow-x-auto p-6">
                    <h4 class="text-xl font-semibold mb-4">Liste des Demandes de Congé</h4>
                    
                    <div class="overflow-x-auto max-h-96">
                        <table class="table-auto w-full min-w-max divide-y divide-gray-200 border border-gray-300">
                            <thead class="bg-gray-100 sticky top-0 z-10">
                                <tr>
                                    <th class="px-6 py-3">Employé</th>
                                    <th class="px-6 py-3">Début</th>
                                    <th class="px-6 py-3">Fin</th>
                                    <th class="px-6 py-3">Total des jours</th>
                                    <th class="px-6 py-3">Raison</th>
                                    <th class="px-6 py-3">Manager</th>
                                    <th class="px-6 py-3">RH</th>
                                    <th class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4">{{ $leave->employer->name }}</td>
                                        <td class="px-6 py-4">{{ $leave->start_date }}</td>
                                        <td class="px-6 py-4">{{ $leave->end_date }}</td>
                                        <td class="px-6 py-4 text-center">{{ $leave->total_days }}</td>
                                        <td class="px-6 py-4">{{ $leave->reason }}</td>
                                        <td class="px-6 py-4 text-{{ $leave->manager_approval == 'Approved' ? 'green' : ($leave->manager_approval == 'Rejected' ? 'red' : 'yellow') }}-500">
                                            {{ $leave->manager_approval }}
                                        </td>
                                        <td class="px-6 py-4 text-{{ $leave->hr_approval == 'Approved' ? 'green' : ($leave->hr_approval == 'Rejected' ? 'red' : 'yellow') }}-500">
                                            {{ $leave->hr_approval }}
                                        </td>
                                        <td class="px-6 py-4">
                                                <div class="flex space-x-4">
                                                    @if(auth()->user()->roles->pluck('name')[0] == 'Manager' )
                                                        <a href="{{ route('leave.approve', $leave) }}" name="manager_approval" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">Approuver</a>
                                                        <a href="{{ route('leave.reject', $leave) }}" name="manager_approval"  class="bg-red-500 text-white font-medium py-2 px-4 rounded hover:bg-red-600 transition">Rejeter</a>
                                                    @endif

                                                    @if(auth()->user()->roles->pluck('name')[0] == 'HR' )
                                                        <a href="{{ route('leave.approve', $leave) }}" name="hr_approval"  class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">Approuver</a>
                                                        <a href="{{ route('leave.reject', $leave) }}" name="hr_approval"  class="bg-red-500 text-white font-medium py-2 px-4 rounded hover:bg-red-600 transition">Rejeter</a>
                                                    @endif
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
