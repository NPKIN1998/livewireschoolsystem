<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Registered students') }}
            </h2>
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
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
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
                            <td class="px-6 py-4">
                                <a href="{{ route('examiner.students.transcript', $enrolledStudent->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Transcript</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
