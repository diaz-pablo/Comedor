<?php

namespace App\Http\Requests\Admin;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->role_id === Role::ADMIN_ID;
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
                    'document_number' => 'bail|required|integer|digits:8|unique:users',
                    'surname' => 'bail|required|string|max:255',
                    'name' => 'bail|required|string|max:255',
                    'email' => 'bail|required|email|unique:users',
                    'status' => 'bail|required',
                ];
            }
            case 'PUT': {
                return [
                    'document_number' => 'bail|required|integer|digits:8|unique:users,document_number,' . $this->route()->user->id,
                    'surname' => 'bail|required|string|max:255',
                    'name' => 'bail|required|string|max:255',
                    'email' => 'bail|required|email|unique:users,email,' . $this->route()->user->id,
                    'generate_new_password' => 'bail|nullable|string',
                    'status' => 'bail|required',
                ];
            }
        }
    }
}
