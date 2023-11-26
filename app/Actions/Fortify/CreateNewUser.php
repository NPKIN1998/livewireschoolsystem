<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // dd($input);
        // dd($input['date_of_enrollment']);
        $randomNumber = rand(100000, 999999);
        $data = str_pad($randomNumber, 6, '0', STR_PAD_LEFT);
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $input['role_id'],
            'address' => $input['address'],
            'phone'=> $input['phone'],
            'gender' => $input['gender'],
            // 'course_id' => $input['course_id'] ?? null,
            // 'student_licence_number' => $input['student_licence_number'] ?? null,
            'teacher_qualifications' => $input['teacher_qualifications'] ?? null,
            'adminsio_no' => $data ?? null,
            // 'date_of_enrollment' => Carbon::createFromFormat('Y-m-d', $input('date_of_enrollment')),
            // 'date_of_birth' => Carbon::createFromFormat('Y-m-d', $input('date_of_birth')),
        ]);
    }
}
