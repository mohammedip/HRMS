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
                            <!-- HR Role at the Top -->
                            <li class="relative">
                                <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md text-center w-48">
                                    <h1 class="text-xl font-bold">HR</h1>
                                </div>

                                <!-- Departments under HR -->
                                <ol class="flex flex-wrap justify-center mt-4 space-x-4">
                                    @foreach ($departments as $department)
                                        <li class="relative">
                                            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md text-center w-48">
                                                <h2 class="text-lg font-bold">{{ $department->nom }}</h2>
                                            </div>

                                            <ol class="flex flex-col items-center mt-4">
                                                <!-- Department Manager -->
                                                @php
                                                    $manager = $department->employes->where('role.name', 'Manager')->first();
                                                @endphp

                                                @if($manager)
                                                    <li>
                                                        <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md text-center w-48">
                                                            <h2 class="text-md font-bold">Manager</h2>
                                                            <p>{{ $manager->name }}</p>
                                                        </div>

                                                        <ol class="flex flex-wrap justify-center mt-4 space-x-4">
                                                            <!-- Other Employees in the Department -->
                                                            @foreach ($department->employes->where('role.name', '!=', 'Manager') as $employer)
                                                                <li>
                                                                    <div class="bg-gray-500 text-white p-4 rounded-lg shadow-md text-center w-40">
                                                                        <h2 class="text-sm font-bold">{{ $employer->role->name }}</h2>
                                                                        <p>{{ $employer->name }}</p>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    </li>
                                                @endif
                                            </ol>
                                        </li>
                                    @endforeach
                                </ol>
                            </li>
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
