<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStlfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'fileName' => ['required', 'string', 'max:255'],
            'file' => ['nullable', 'file'],
            'category_id' => ['required', 'exists:category,id'],
            'isActive' => ['nullable', 'boolean'],
        ];
    }
}
