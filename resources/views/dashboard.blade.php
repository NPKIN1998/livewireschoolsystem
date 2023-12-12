<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @if (auth()->user()->role_id == '1')
                    <x-welcome-admin />
                @elseif(auth()->user()->role_id == '3')
                    <x-welcome-teacher />
                @elseif(auth()->user()->role_id == '2')
                    <x-welcome-student />
                @elseif(auth()->user()->role_id == '4')
                    <x-welcome-academic />
                @elseif(auth()->user()->role_id == '5')
                    <x-welcome-examiner />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
