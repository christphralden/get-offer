<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phoneNumber' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'link' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
