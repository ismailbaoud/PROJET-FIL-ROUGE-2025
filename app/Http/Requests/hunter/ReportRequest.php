<?php

namespace App\Http\Requests\hunter;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'type' => 'required|in:SQL Injection,XSS,CSRF,RCE,Other',
            'target' => 'required|string|max:255',
            'steps' => 'required|string',
            'impact' => 'required|string',
            'poc' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime',
            'severity' => 'required|in:Low,Medium,High,Critical',
        ];
    }
}
