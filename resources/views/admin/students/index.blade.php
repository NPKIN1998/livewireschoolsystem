<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Registed student') }}
            </h2>

            <a class="px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                href="{{ route('admin.students.enroll.store') }}">
                {{ __('Enroll new student') }}
            </a>
        </div>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Student name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Admission number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gender
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Course Pursing
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Semester
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Year
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Erollment Date
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Action
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enrolledStudents as $enrolledStudent)
                        <tr
                            class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $enrolledStudent->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $enrolledStudent->adminsio_no }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $enrolledStudent->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $enrolledStudent->gender }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $enrolledStudent->course_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $enrolledStudent->semester }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $enrolledStudent->year_student }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $enrolledStudent->status }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $enrolledStudent->year_enrollment }}
                            </td>
                            {{-- <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
