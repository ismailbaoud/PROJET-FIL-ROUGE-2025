<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepriseRegisterRequest extends FormRequest
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
            "fullName"=>"required",
            "businessEmail"=>"email",
            "password"=>"required | min:8",
            "companyName"=>"required",
            "companyUrl"=>"required",
            "country"=>"required",
            "state"=>"required",
        ];
    }
}
