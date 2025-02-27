<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            {{-- @if(request()->has('view_delete')) --}}
                <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-3 gap-4">
                    <a href="{{ route('departments.restore.all') }}" class="bg-blue-500 text-white text-center text-lg font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                                Restore all department 
                    </a>
                    <a href="{{ route('employer.restore.all') }}" class="bg-blue-500 text-white text-center text-lg font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                                Restore all employers 
                    </a>
                </div>
               {{-- @endif --}}
            </div>
        </div>
    </div>
</x-app-layout>
