<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Register new course') }}
            </h2>

            <a class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                href="{{ route('admin.courses') }}">
                {{ __('Course list') }}
            </a>
        </div>
    </x-slot>
    <x-validation-errors class="mb-4" />
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font">
                <div class="container flex flex-wrap items-center px-5 py-24 mx-auto">
                    <div class="flex flex-col w-full p-8 mt-10 bg-gray-100 rounded-lg md:ml-auto md:mt-0">
                        <center>
                            <h2 class="items-center justify-center mb-5 text-lg font-medium text-gray-900 title-font">
                                Course
                                registration</h2>
                        </center>
                        <form action="{{ route('admin.courses.store') }}" method="POST">
                            @csrf
                            <div class="relative mb-4">
                                <label for="school_id" class="text-sm leading-7 text-gray-600">School name</label>
                                {{-- <select id="school_name" name="school_name"
                            class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 @error('school_name') is-invalid @enderror">
                            <option value="">School name</option>
                            @foreach ($schools as $school)
                                <option :value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select> --}}
                                <x-school-selection />
                                @error('school_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="course_name" class="text-sm leading-7 text-gray-600">Course name</label>
                                <input type="text" id="course_name" name="course_name"
                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 @error('course_name') is-invalid @enderror"
                                    value="{{ old('course_name') }}"
                                    placeholder="Bachelor of computer security and forensics">
                                @error('course_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="course_code" class="text-sm leading-7 text-gray-600">Course code</label>
                                <input type="text" id="course_code" name="course_code"
                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 @error('course_code') is-invalid @enderror"
                                    value="{{ old('course_code') }}" placeholder="206">
                                @error('course_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <input type="text" id="course_type" name="course_type"
                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 @error('course_type') is-invalid @enderror"
                                    value="{{ old('course_type') }}" placeholder="Full Time">

                                @error('course_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="course_duration" class="text-sm leading-7 text-gray-600">Course
                                    Duration</label>
                                <input type="text" id="course_duration" name="course_duration"
                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 @error('course_duration') is-invalid @enderror"
                                    value="{{ old('course_duration') }}" placeholder="4 years">
                                @error('course_duration')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="course_fee" class="text-sm leading-7 text-gray-600">Course Fee</label>
                                <input type="text" id="course_fee" name="course_fee"
                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 @error('course_fee') is-invalid @enderror"
                                    value="{{ old('course_fee') }}" placeholder="Ksh. 30,000 per semister">
                                @error('course_fee')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="relative mb-4">
                                <label for="course_description" class="text-sm leading-7 text-gray-600">Course
                                    description</label>
                                <textarea type="text" id="course_description" name="course_description" value="{{ old('course_description') }}"
                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200  @error('course_description') is-invalid @enderror"></textarea>
                                @error('course_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit"
                                class="px-8 py-2 text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">Create
                                coures</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
