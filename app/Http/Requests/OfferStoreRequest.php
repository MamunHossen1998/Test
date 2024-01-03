<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferStoreRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|digits_between:1,5',
            'categories.*' => 'exists:categories,id',
            // 'categories.*' => 'filled',
            'locations.*' => 'filled',
        ];
    }
    public function messages(): array
    {
        return [
            'categories.*' => 'Categories attribute can not be empty',
            'locations.*' => 'Locations attribute can not be empty',
        ];
    }
}
