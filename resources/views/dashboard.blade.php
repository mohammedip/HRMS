<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6 text-center">
                            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Employers</h2>
                            <p class="text-3xl font-bold text-blue-500">{{ $employerCount }}</p>
                        </div>

                        <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6 text-center">
                            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Emplois</h2>
                            <p class="text-3xl font-bold text-green-500">{{ $emploiCount }}</p>
                        </div>

                        <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6 text-center">
                            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Formations</h2>
                            <p class="text-3xl font-bold text-red-500">{{ $formationCount }}</p>
                        </div>

                        <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6 text-center">
                            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Departments</h2>
                            <p class="text-3xl font-bold text-purple-500">{{ $departmentCount }}</p>
                        </div>
                    </div>
                </div> 
            </div>
            @canany(['HR permission','Admin permission'])
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                <a href="{{ route('departments.restore.all') }}" 
                    class="bg-blue-500 text-white text-center text-lg font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                    Restore all departments
                </a>
                <a href="{{ route('employer.restore.all') }}" 
                    class="bg-blue-500 text-white text-center text-lg font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                    Restore all employers
                </a>
            </div>
            @endcanany
            <div class="fixed bottom-4 right-4 z-50">
                @if(auth()->user()->notifications)
                    <ul id="notification-list" class="grid grid-cols-1 gap-2 max-w-3xl">
                        @foreach(auth()->user()->notifications as $notification)
                            <li class="flex items-end bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md transition-transform transform hover:scale-105 w-[400px]">
                                <div class="flex-1">
                                    <strong class="text-gray-800 dark:text-gray-200">{{ $notification->data['title'] }}</strong>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $notification->data['message'] }}</p>
                                </div>
                                <button class="ml-4 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-sm dismiss-btn">OK</button>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
                 
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                let notifications = document.querySelectorAll(".notification-item");
                notifications.forEach(notification => {
                    notification.style.transition = "opacity 1s";
                    notification.style.opacity = "0";
                    setTimeout(() => notification.remove(), 1000);
                });
            }, 5000);
            
            document.querySelectorAll(".dismiss-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let notification = this.parentElement;
                    notification.style.transition = "opacity 0.5s";
                    notification.style.opacity = "0";
                    setTimeout(() => notification.remove(), 500);
                });
            });
        });
    </script>
</x-app-layout>
