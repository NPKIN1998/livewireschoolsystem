<div class="flex justify-center gap-4 p-6 bg-gray-200 bg-opacity-25">
    <?php
    $userId = Auth::id();
    
    $userData = DB::table('registered_students')
        ->where('user_id', $userId)
        ->first();
    $courseName = DB::table('courses')
        ->where('id', $userData->course_id)
        ->first();
    
    ?>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow max-w-1/2 dark:bg-gray-800 dark:border-gray-700">
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Student Name:
            {{ Auth::user()->name }}
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Student ID:{{ Auth::user()->adminsio_no }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Student Email: {{ Auth::user()->email }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Studing course:{{ $courseName->course_name }}
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Academic year:{{ $userData->year_student }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Current semester:{{ $userData->semester }}</p>
    </div>
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow max-w-1/2 dark:bg-gray-800 dark:border-gray-700">
        <h2>Units </h2>
    </div>
</div>
