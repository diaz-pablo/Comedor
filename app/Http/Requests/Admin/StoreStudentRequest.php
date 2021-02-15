<?php

namespace App\Http\Requests\Admin;

use App\Models\Role;
use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole([Role::ADMIN_NAME]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST': {
                return [
                    'document_number' => 'bail|required|integer|digits:8|unique:students,document_number',
                    'surname' => 'bail|required|string|max:255',
                    'name' => 'bail|required|string|max:255',
                    'email' => 'bail|required|email|unique:users,email',
                    'status' => 'bail|required|' . Rule::in([Student::SUSPENDED, Student::PENDING, Student::ACTIVE]),
                ];
            }
            case 'PUT': {
                return [
                    'document_number' => 'bail|required|integer|digits:8|unique:students,document_number,' . $this->route('student')->id,
                    'surname' => 'bail|required|string|max:255',
                    'name' => 'bail|required|string|max:255',
                    'email' => 'bail|required|email|unique:users,email,' . $this->route('student')->user_id,
                    'status' => 'bail|required|' . Rule::in([Student::SUSPENDED, Student::PENDING, Student::ACTIVE]),
                ];
            }
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'status.in' =>'El campo :attribute es inválido.'
        ];
    }

}
