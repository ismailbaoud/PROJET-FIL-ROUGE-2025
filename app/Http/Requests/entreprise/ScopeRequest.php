<?php

namespace App\Http\Requests\entreprise;

use Illuminate\Foundation\Http\FormRequest;

class ScopeRequest extends FormRequest
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
            'target' => 'required|string',
            'target_type' => 'required|in:web,mobile,api,other',
            'type' => 'required|in:in,out',
            'instructions' => 'nullable|string',
        ];
    }
}
