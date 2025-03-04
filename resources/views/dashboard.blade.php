<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-3/4 xl:w-4/5">
                @if(session('status'))
                    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <div id="wrapper">
                    <div id="container">
                        <ol class="organizational-chart flex flex-col items-center">
                            <!-- HR at the Top -->
                            <li class="relative">
                                <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md text-center w-48">
                                    <h1 class="text-xl font-bold">HR</h1>
                                </div>
                                
                                <ol class="flex flex-wrap justify-center mt-4 space-x-4">
                                    @foreach ($hrEmployers as $hrEmployer)
                                        <li>
                                            <div class="bg-gray-500 text-white p-4 rounded-lg shadow-md text-center w-40">
                                                <p class="font-bold">{{ $hrEmployer->name }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </li>

                            <!-- Departments -->
                            <ol class="flex flex-wrap justify-center mt-8 space-x-8">
                                @foreach ($departments as $department)
                                    <li class="relative flex flex-col items-center">
                                        <!-- Department Name -->
                                        <div class="bg-green-500 text-white p-4 rounded-lg shadow-md text-center w-48">
                                            <h2 class="text-lg font-bold">Department: {{ $department->nom }}</h2>
                                        </div>

                                        <!-- Department Manager -->
                                        @php
                                            $manager = $department->employes->where('role.name', 'Manager')->first();
                                        @endphp
                                        @if($manager)
                                            <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md text-center w-48 mt-4">
                                                <h2 class="text-md font-bold">Manager</h2>
                                                <p>{{ $manager->name }}</p>
                                            </div>
                                        @endif

                                        <!-- Employees -->
                                        <ol class="flex flex-wrap justify-center mt-4 space-x-4">
                                            @foreach ($department->employes->where('role.name', 'Employee') as $employee)
                                                <li>
                                                    <div class="bg-gray-500 text-white p-4 rounded-lg shadow-md text-center w-40">
                                                        <h2 class="text-sm font-bold">Employee</h2>
                                                        <p>{{ $employee->name }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </li>
                                @endforeach
                            </ol>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .organizational-chart li {
            position: relative;
        }

        .organizational-chart li::before,
        .organizational-chart li::after {
            content: '';
            position: absolute;
            background-color: #b7a6aa;
        }

        .organizational-chart > li > ol::before {
            width: 2px;
            height: 24px;
            left: 50%;
            top: -24px;
        }

        .organizational-chart > li > ol > li::before {
            width: 2px;
            height: 24px;
            left: 50%;
            top: -24px;
        }
    </style>
</x-app-layout>
