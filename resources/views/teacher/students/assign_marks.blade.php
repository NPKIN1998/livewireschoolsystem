<x-teacher-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Assign Marks') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('teacher.studentsmark.store', ['studentId' => $student->id]) }}">
                @csrf
                <label for="mark">Enter Mark for {{ $student->name }}:</label>
                <br>
                <x-input type="text"  id="mark" name="marks" min="0" max="100"/><br><br>
                <small>Input mark ranging from 0 to 100 percent</small>
                <button type="submit">Assign Mark</button>
            </form>
        </div>
    </div>
</x-teacher-layout>
