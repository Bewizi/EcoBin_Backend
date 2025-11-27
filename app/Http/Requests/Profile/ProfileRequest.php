<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'avatar' => ['sometimes', 'nullable', 'string', 'max:255'],
            'userType' => ['sometimes', 'string', Rule::in([
                'individual',
                'business',
                'household'
            ])],
            'pickupLocation' => ['sometimes', 'string', 'max:255'],
        ];
    }
}
