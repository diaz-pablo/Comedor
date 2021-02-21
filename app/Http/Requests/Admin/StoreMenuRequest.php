<?php

namespace App\Http\Requests\Admin;

use App\Models\Role;
use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMenuRequest extends FormRequest
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
                    'service_at' => 'bail|required|date_format:Y-m-d|after_or_equal:' . now()->format('Y-m-d') . '|unique:menus,service_at'
                ];
            }
            case 'PUT': {
                return [
                    'service_at' => 'bail|required',
                    'starter_id' => 'bail|required',
                    'main_id' => 'bail|required',
                    'dessert_id' => 'bail|required',
                    'publication_at' => 'bail|required',
                    'available_quantity' => 'bail|required',
                ];
            }
        }
    }
}
