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
                        <ol class="organizational-chart flex flex-col items-center space-y-12">
                            <!-- HR at the Top (no line before it) -->
                            <li class="relative">
                                <ol class="flex justify-center mt-4 space-x-8">
                                    @foreach ($hrEmployers as $hrEmployer)
                                        <li>
                                            <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md text-center w-48">
                                                <h2 class="text-md font-bold">HR</h2>
                                                <p class="font-bold">{{ $hrEmployer->name }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </li>

                            <!-- Departments -->
                            <ol class="flex flex-wrap justify-center mt-8 space-x-8">
                                @foreach ($departments as $department)
                                    <li class="relative flex flex-col items-center space-y-4">
                                        <!-- Department Name -->
                                        <div class="bg-green-500 text-white p-4 rounded-lg shadow-md text-center w-56">
                                            <h2 class="text-lg font-bold">Department</h2>
                                            <p>{{ $department->nom }}</p>
                                        </div>
                                        <!-- Line from Department to Manager -->
                                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-12 w-1 h-8 bg-brown-500"></div>

                                        <!-- Department Manager -->
                                        @php
                                            $manager = $department->employes->where('role.name', 'Manager')->first();
                                        @endphp
                                        @if($manager)
                                            <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md text-center w-48 mt-4">
                                                <h2 class="text-md font-bold">Manager</h2>
                                                <p>{{ $manager->name }}</p>
                                            </div>
                                            <!-- Line from Manager to Employees -->
                                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-12 w-1 h-8 bg-brown-500"></div>
                                        @endif

                                        <!-- Employees -->
                                        <ol class="flex flex-wrap justify-center mt-4 space-x-8">
                                            @foreach ($department->employes->where('role.name', 'Employe') as $employee)
                                                <li class="relative">
                                                    <div class="bg-gray-500 text-white p-4 rounded-lg shadow-md text-center w-40">
                                                        <h2 class="text-sm font-bold">Employee</h2>
                                                        <p>{{ $employee->name }}</p>
                                                    </div>
                                                    @if (!$loop->last)
                                                        <div class="absolute top-1/2 right-0 w-1 h-8 bg-brown-500"></div>
                                                    @endif
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

        .organizational-chart > li > ol:before {
            content: none;
        }

        .organizational-chart > li > ol > li > ol:before {
            width: 2px;
            height: 24px;
            left: 50%;
            top: -24px;
        }

        .organizational-chart > li > ol > li > ol > li::before {
            content: '';
            position: absolute;
            left: 50%;
            top: -24px;
            width: 2px;
            height: 24px;
            background-color: #b7a6aa;
        }

        .organizational-chart {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .organizational-chart > li > ol > li > div.bg-green-500 + .absolute {
            position: absolute;
            top: 100%;
            left: 50%;
            width: 2px;
            height: 24px;
            background-color: #b7a6aa;
        }

        .organizational-chart > li > ol > li > div.bg-yellow-500 + .absolute {
            position: absolute;
            top: 100%;
            left: 50%;
            width: 2px;
            height: 24px;
            background-color: #b7a6aa;
        }

        .organizational-chart > li > ol > li.relative > .absolute {
            position: absolute;
            top: 100%;
            right: -15px;
            width: 2px;
            height: 24px;
            background-color: #b7a6aa;
        }
    </style>
</x-app-layout>
