<?php

namespace App\Http\Requests\WasteCategory;

use Illuminate\Foundation\Http\FormRequest;

class WasteCategoryRequests extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            // ensure *slug* is unique in the waste_categories table
            'slug' => ['required', 'string', 'unique:waste_categories,slug', 'max:255'],
        ];
    }
}
