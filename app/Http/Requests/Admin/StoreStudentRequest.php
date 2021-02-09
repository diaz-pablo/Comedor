<?php

namespace App\Http\Requests\Admin;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return auth()->user()->role_id === Role::ADMIN_ID;
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
                    'status' => 'bail|required',
                ];
            }
            case 'PUT': {
                return [
                    'document_number' => 'bail|required|integer|digits:8|unique:students,document_number,' . $this->route('student')->id,
                    'surname' => 'bail|required|string|max:255',
                    'name' => 'bail|required|string|max:255',
                    'email' => 'bail|required|email|unique:users,email,' . $this->route('student')->user_id,
                    'status' => 'bail|required',
                ];
            }
        }
    }
}
