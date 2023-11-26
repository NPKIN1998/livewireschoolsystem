<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Register new school') }}
            </h2>

            <a class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                href="{{ route('admin.schools') }}">
                {{ __('School list') }}
            </a>
        </div>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font">
                <div class="container flex flex-wrap items-center px-5 py-24 mx-auto">
                    <div class="flex flex-col w-full p-8 mt-10 bg-gray-100 rounded-lg md:ml-auto md:mt-0">
                        <center>
                            <h2 class="items-center justify-center mb-5 text-lg font-medium text-gray-900 title-font">
                                School
                                registration</h2>
                        </center>
                        <form action="{{ route('admin.schools.store') }}" method="POST">
                            @csrf
                            <div class="relative mb-4">
                                <label for="name" class="text-sm leading-7 text-gray-600">School name</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="school of computing">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="school_code" class="text-sm leading-7 text-gray-600">School code</label>
                                <input type="text" id="school_code" name="school_code"
                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 @error('school_code') is-invalid @enderror"
                                    value="{{ old('school_code') }}" placeholder="CT">
                                @error('school_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="description" class="text-sm leading-7 text-gray-600">School
                                    description</label>
                                <textarea type="text" id="description" name="description" value="{{ old('description') }}"
                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200  @error('description') is-invalid @enderror"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit"we
                                class="px-8 py-2 text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">Create
                                school</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
