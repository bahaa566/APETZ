<?php

namespace App\Http\Requests\Api\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => ['required', Password::default()],
            'new_password' => ['required', Password::default(), 'confirmed'],
        ];
    }

    /**
     * validate password old value and new one
     *
     * @return void
     * @throws ValidationException
     */
    public function validateNewPassword()
    {
        $user = $this->user();
        if (Hash::check($this->old_password, $user->password)) {

            if (!Hash::check($this->new_password, $user->password)) {
                $user->update(['password' => $this->new_password]);
                $user->tokens()->delete();
                return true;
            }

            throw ValidationException::withMessages([
                'new_password' => __('New Password Equal Old One'),
            ]);
        }

        throw ValidationException::withMessages([
            'old_password' => __('Old Password Is Incorrect'),
        ]);
    }
}
