<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-3/4 xl:w-4/5">
                @if(session('status'))
                <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded">
                    {{ session('status') }}
                </div>
                @endif

                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Employer List</h4>
                        <a href="{{ url('employer/create') }}" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">
                            Add employer
                        </a>
                    </div>
                    
                    <!-- Container with overflow handling -->
                    <div class="mt-2 max-h-[80vh] overflow-y-auto">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full min-w-max divide-y divide-gray-200 border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Id</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Email</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Phone</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Department</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Role</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Grade</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Emploi</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Recruitment Date</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Leave Days</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Extra Time</th>

                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employers as $employer)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $employer->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->name }} </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->telephone }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->department->nom ?? 'N/A'}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->role->name ?? 'N/A'}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->grad }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->emploi->nom ?? 'N/A'}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->date_recrutement }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->leave_sold }} Days</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employer->extra_time }} Days
                                            @can('HR permission')
                                            <a href="{{ route('employer.extractExtraTime', $employer->id) }}" 
                                                class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-lg hover:bg-blue-600 focus:outline-none">
                                                 Extract it
                                             </a>
                                             @endcan

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ route('employer.edit', $employer->id) }}" class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-700">Edit</a>
                                            <a href="{{ route('employer.show', $employer->id) }}" class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-700">Show</a>
                                            <form action="{{ route('employer.destroy', $employer->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $employers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
