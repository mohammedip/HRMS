<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-3/4 xl:w-2/3">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <h4 class="text-xl font-semibold mb-4">Demande de Congé</h4>
                    
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-800 border border-red-300 p-4 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('leave.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium" for="start_date">Date de début</label>
                            <input type="date" id="start_date" name="start_date" class="w-full border-gray-300 p-2 rounded" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_days" class="block text-sm font-medium text-gray-700">Total des jours</label>
                            <input type="number" name="total_days" id="total_days" step="1"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium" for="end_date">Date de fin</label>
                            <input type="date" id="end_date" name="end_date" class="w-full border-gray-300 p-2 rounded" required readonly>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium" for="reason">Raison</label>
                            <textarea id="reason" name="reason" rows="3" class="w-full border-gray-300 p-2 rounded" required></textarea>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">
                                Soumettre la demande
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('start_date').addEventListener('change', updateEndDate);
        document.getElementById('total_days').addEventListener('input', updateEndDate);

        function updateEndDate() {
            let startDate = document.getElementById('start_date').value;
            let totalDays = parseInt(document.getElementById('total_days').value, 10);
            
            if (startDate && totalDays > 0) {
                let startDateObj = new Date(startDate);
                startDateObj.setDate(startDateObj.getDate() + totalDays - 1);
                
                let endDateStr = startDateObj.toISOString().split('T')[0];
                document.getElementById('end_date').value = endDateStr;
            } else {
                document.getElementById('end_date').value = '';
            }
        }
    </script>
</x-app-layout>