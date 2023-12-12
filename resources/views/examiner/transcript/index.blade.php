<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Transcript') }}
            </h2>


        </div>
    </x-slot>
    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1>All Student Marks</h1>
            @if ($marks)
                @foreach ($marks as $mark)
                    <h2>{{ $mark->name }}</h2>
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                {{-- <th scope="col" class="px-6 py-3">Student Name</th> --}}
                                <th scope="col" class="px-6 py-3">Unit Name</th>
                                <th scope="col" class="px-6 py-3">Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($mark->unitRegistrations)
                                @foreach ($mark->unitRegistrations as $unitRegistration)
                                    <tr
                                        class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                                        {{-- <td class="px-6 py-4">{{ $mark->name }}</td> --}}
                                        <td class="px-6 py-4">{{ $unitRegistration->unit->unit_name }}</td>
                                        <td class="px-6 py-4">
                                            @if ($unitRegistration->unitMarks)
                                                @foreach ($unitRegistration->unitMarks as $mark)
                                                    {{ $mark->marks }}
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                @endforeach
            @else
                <p>No students found.</p>
            @endif
        </div>
    </div>
</x-admin-layout>
{{-- @extends('layouts.app')

@section('content')
    <h1>All Student Marks</h1>
    
    @if ($marks)
       @foreach ($marks as $mark)
            <h2>{{ $mark->first()->name }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>Unit Name</th>
                        <th>Marks</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($mark->unitRegistrations)
                        @foreach ($mark->unitRegistrations as $unitRegistration)
                            <tr>
                                <td>{{ $unitRegistration->unit->unit_name }}</td>
                                <td>
                                    @if ($unitRegistration->unitMarks)
                                        @foreach ($unitRegistration->unitMarks as $mark)
                                            {{ $mark->marks }}
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        @endforeach
    @else
        <p>No students found.</p>
    @endif
@endsection --}}
