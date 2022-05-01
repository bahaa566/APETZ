<?php

namespace App\Http\Requests\Api\User\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'phone'    => ['sometimes', 'exists:users,phone', 'phone:EG,SA'],
            'email'    => ['sometimes', 'exists:users,email'],
            'password' => ['required', Password::default()],
            'token'    => ['required', 'string']
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     *  @return User $user
     */
    public function phoneAuthenticate(): User
    {
        $user = User::wherePhone($this->phone)->first();
        if (!(Hash::check($this->password, $user->password))) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
        $user['token'] = $user->createToken('MyApp')->plainTextToken;
        return $user;
    }

    public function emailAuthenticate(): User
    {
        $user = User::whereEmail($this->email)->first();
        if (!(Hash::check($this->password, $user->password))) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
        $user['token'] = $user->createToken('MyApp')->plainTextToken;
        return $user;
    }
}
