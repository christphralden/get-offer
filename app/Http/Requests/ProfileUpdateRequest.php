<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user()->id,
            'phoneNumber' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'role' => 'required|in:jobseeker,recruiter', // Validate role input
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
