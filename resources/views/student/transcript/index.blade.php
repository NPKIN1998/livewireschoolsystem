<x-student-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Marks List') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th  scope="col" class="px-6 py-3">Unit Name</th>
                        <th  scope="col" class="px-6 py-3">Marks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marks as $mark)
                        <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $mark->unitRegistration->unit->unit_name }}</td>
                            <td class="px-6 py-4">{{ $mark->marks }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <table>
                <thead>
                    <tr>
                        <th>Unit Name</th>
                        <th>Marks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marks as $mark)
                        <tr>
                            <td>{{ $mark->unit_name }}</td>
                            <td>{{ $mark->marks }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>
</x-student-layout>
