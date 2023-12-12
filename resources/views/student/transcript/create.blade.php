<x-student-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Unit registration') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-validation-errors class="mb-4" />
    
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
