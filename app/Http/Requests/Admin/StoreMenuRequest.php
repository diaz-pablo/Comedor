<?php

namespace App\Http\Requests\Admin;

use App\Models\Role;
use App\Models\Student;
use Carbon\Carbon;
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
                    'service_at' => 'bail|required|date_format:Y-m-d|after_or_equal:' . Carbon::now()->format('Y-m-d') . '|unique:menus,service_at'
                ];
            }
            case 'PUT': {
                return [
                    'service_at' => 'bail|required|date_format:Y-m-d|after_or_equal:' . Carbon::now()->format('Y-m-d') . '|unique:menus,service_at,' . $this->route('menu')->id,
                    'starter_id' => 'bail|required|integer',
                    'main_id' => 'bail|required|integer',
                    'dessert_id' => 'bail|required|integer',
                    'publication_at' => 'bail|required|date_format:Y-m-d|after_or_equal:' . Carbon::now()->format('Y-m-d') . '|before_or_equal:service_at',
                    'available_quantity' => 'bail|required|integer|min:1',
                ];
            }
        }
    }
}
