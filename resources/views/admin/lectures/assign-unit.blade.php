<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Assign lecture units') }}
            </h2>
        </div>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- assignUnitToTeacher.blade.php -->
            <x-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('admin.lecturesunit.store') }}">
                @csrf
                <div>
                    <label for="teacher">Select a Teacher:</label>

                    <select id="teacher" name="user_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <!-- Loop through teachers -->
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="unit">Select a Unit:</label>
                    <select name="unit_id" id="unit"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <!-- Loop through units -->
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit">Assign Unit</button>
            </form>

        </div>
    </div>

</x-admin-layout>
