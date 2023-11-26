<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Registed student') }}
            </h2>

            <a class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                href="{{ route('admin.students.enroll') }}">
                {{ __('Enroll new student') }}
            </a>
        </div>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form class="max-w-sm mx-auto" action="{{ route('admin.students.enroll.store') }}" method="post">
                @csrf
                <div>
                    <x-label for="course_id" class="text-sm leading-7 text-gray-600">{{ __('Course name') }}</x-label>
                    <select name="course_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="user_id" value="{{ __('Student name') }}" />
                    <select name="user_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="semester" value="{{ __('Enter semester') }}" />
                    <x-input id="semester" class="block w-full mt-1" type="text" :value="old('semester')"
                        name="semester" />
                </div>

                <div class="mt-4">
                    <x-label for="year_enrollment" value="{{ __('Enter year of enrollment') }}" />
                    <x-input id="year_enrollment" class="block w-full mt-1" type="date" :value="old('year_enrollment')"
                        name="year_enrollment" />
                </div>

                <div class="mt-4">
                    <x-label for=" kcse_score" value="{{ __('Enter kcse grade') }}" />
                    <x-input id=" kcse_score" class="block w-full mt-1" type="text" :value="old(' kcse_score')"
                        name=" kcse_score" />
                </div>

                <button type="submit"
                    class="px-8 py-2 text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">Enroll
                </button>

            </form>
        </div>
    </div>
</x-admin-layout>
