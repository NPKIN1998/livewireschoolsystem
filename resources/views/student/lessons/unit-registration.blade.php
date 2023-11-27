<x-student-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Unit registration') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-validation-errors class="mb-4" />
            <div id="toast-default"
                class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z" />
                    </svg>
                    <span class="sr-only">Fire icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#toast-default" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            @if (session('status'))
                <div class="mb-4 text-sm font-medium text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            {{-- <form method="POST" action="{{ route('student.registerunits.store') }}">
                @csrf

                <div>
                    @foreach ($units as $unit)
                        <ul class="flex justify-between">
                            <li>
                                <span>{{ $unit->unit_number }}
                                </span>
                                {{ $unit->unit_name }}
                            </li>
                            <x-label for="unit" value="{{ __('Register as:') }}" />
                            <select name="status[]" x-model="status"
                                class="block mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="Register">Register</option>
                                <option value="Deregister">Deregister</option>
                            </select>
                        </ul>
                    @endforeach
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-button class="ms-4">
                        {{ __('Register Units') }}
                    </x-button>
                </div>
            </form> --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('student.registerunits.store') }}" method="POST">
                @csrf
                @foreach ($units as $unit)
                    <div class="unit">
                        <h3>{{ $unit->unit_name }}</h3>
                        <input type="hidden" name="unit_ids[]" value="{{ $unit->id }}">

                    </div>
                @endforeach
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</x-student-layout>