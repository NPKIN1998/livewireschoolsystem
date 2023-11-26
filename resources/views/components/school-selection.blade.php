<div x-data="{ selectedSchool: '' }" class="mt-2">
    <select name="school_id" x-model="selectedSchool"
        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-white border border-gray-300 rounded outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
        <option value="">Select school</option>
        @foreach ($schools as $school)
            <option value="{{ $school->id }}">{{ $school->name }}</option>
        @endforeach
    </select>
</div>