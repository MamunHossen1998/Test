<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

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
            // 'categories.*' => 'exists:categories,id',
            'image' => ['nullable',File::image()->max('10mb')],
            'categories.*' => 'filled',
            'locations.*' => 'filled',
            // 'locations.*' => 'exists:locations,id',
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
