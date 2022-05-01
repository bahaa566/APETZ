<?php

namespace App\Http\Requests\Api\User\Auth;

use App\Models\Pet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:3'],
            'last_name' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'unique:users,phone', 'phone:EG,SA'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', Password::default(), 'confirmed'],
            //pet
            'nickname' => ['sometimes', 'string', 'min:3'],
            'date_of_birth' => ['sometimes', 'date_format:Y-m-d', 'before:today'],
            'latitude' => ['nullable', 'string'],
            'longitude' => ['nullable', 'string'],
            'location' => ['sometimes', 'string', 'min:3'],
            'interests' => ['sometimes', 'string'],
            'gender' => ['sometimes', 'in:male,female'],
            'image' => ['sometimes', 'image', 'max:2084'],
            'type_id'  => ['sometimes', 'integer', 'exists:types,id'],
            'animal_id' => ['nullable', 'string'],
            'type' => ['nullable', 'string'],
        ];
    }
}
