<?php

namespace Admins\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u|min:4|max:191|unique:Categories',
        ];
    }
    public function  messages()
    {
        return [
            'name.unique' => 'Category name should be unique',
            'name.required' => 'Category name is Required'
        ];

    }
}
