<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Register new unit') }}
            </h2>

            <a class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                href="{{ route('admin.units') }}">
                {{ __('Unit list') }}
            </a>
        </div>
    </x-slot>
    <x-validation-errors class="mb-4" />
    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font">
                <div class="container flex flex-wrap items-center px-5 py-24 mx-auto">
                    <div class="flex flex-col w-full p-8 mt-10 bg-gray-100 rounded-lg md:ml-auto md:mt-0">
                        <center>
                            <h2 class="items-center justify-center mb-5 text-lg font-medium text-gray-900 title-font">
                                Add new unit
                            </h2>
                        </center>
                        <form action="{{ route('admin.units.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <x-label for="school_id"
                                    class="text-sm leading-7 text-gray-600">{{ __('School name') }}</x-label>
                                <select name="school_id">
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <x-label for="unit_name" value="{{ __('Unit name') }}" />
                                <x-input id="unit_name" class="block w-full mt-1" type="text" name="unit_name"
                                    :value="old('unit_name')" required autocomplete="unit_name" />
                            </div>

                            <div class="mb-4">
                                <x-label for="unit_number" value="{{ __('Unit code') }}" />
                                <x-input id="unit_number" class="block w-full mt-1" type="text" name="unit_number"
                                    :value="old('unit_number')" required autocomplete="unit_number" />
                            </div>

                            <div class="mb-4">
                                <x-label for="semester" value="{{ __('Enter academic semester') }}" />
                                <select name="semester" x-model="semester"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="1">semester 1</option>
                                    <option value="2">semester 2</option>
                                    <option value="3">semester 3</option>
                                    {{-- <option value="4">semester 4</option> --}}
                                </select>
                            </div>
                            <div class="mb-4">
                                <x-label for="year" value="{{ __('Enter academic year') }}" />
                                <select name="year" x-model="year"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="1">year 1</option>
                                    <option value="2">year 2</option>
                                    <option value="2">year 3</option>
                                    <option value="2">year 4</option>
                                </select>
                            </div>

                            <x-button class="ms-4">{{ __('Create unit') }}</x-button>
                        </form>

                    </div>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
