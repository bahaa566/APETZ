<?php

namespace App\Http\Requests\Api\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInformationRequest extends FormRequest
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
            'first_name'     => ['sometimes', 'string', 'min:3'],
            'last_name'     => ['sometimes', 'string', 'min:3'],
            'phone'    => ['sometimes', 'unique:users,phone,${$this->user()->id}', 'phone:EG,SA'],
            'email'    => ['sometimes', 'unique:users,email,${$this->user()->id}'],
//            'city_id'  => ['sometimes', 'integer', 'exists:cities,id'],
            'image'    => ['sometimes', 'image', 'max:2084']
        ];
    }
}
