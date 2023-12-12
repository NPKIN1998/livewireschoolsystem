<?php

namespace App\Http\Requests\AcademicOfficer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'school_id' => 'required',
            'course_name' => 'required',
            'course_code' => 'required',
            'course_description' => 'required',
            'course_type' => 'required',
            'course_duration' => 'required',
            'course_fee' => 'required',
        ];
    }
}
