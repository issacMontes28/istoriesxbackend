<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'platform' => 'required|string|max:255',
            'url' => 'required|url',
            'media_type' => 'required|string|in:audio,video,image', // Ejemplo de validación de tipo
        ];
    }

    /**
     * custom error messages
     */
    public function messages()
    {
        return [
            'platform.required' => 'La plataforma es obligatoria.',
            'url.required' => 'La URL es obligatoria.',
            'media_type.required' => 'El tipo de medio es obligatorio.',
            'media_type.in' => 'El tipo de medio debe ser uno de los siguientes: audio, video, imagen.',
        ];
    }
}
