<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreStlfileRequest extends FormRequest
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
            'displayName' => ['nullable', 'string', 'max:255'],
            'file' => [
                'required',
                'file',
                'max:51200', // 50 MB
                File::types(['application/octet-stream', 'model/stl', 'application/sla'])
                    ->extensions(['stl']),
            ],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'isActive' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'Debes seleccionar un archivo.',
            'file.file' => 'El archivo no es valido.',
            'file.max' => 'El archivo no puede superar los 50 MB.',
            'file.extensions' => 'El archivo debe ser un STL (.stl).',
            'file.mimetypes' => 'El tipo de archivo no es valido. Sube un STL (.stl).',
        ];
    }
}
