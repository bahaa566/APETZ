<?php

namespace App\Http\Resources\Api\User\Auth;

use App\Helpers\Helper;
use App\Http\Resources\Api\General\TypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'pet' => [
                'id' => $this->id,
                'nickname' => $this->nickname,
                'birthdate' => $this->date_of_birth,
                'gender' => $this->gender,
                'interests' => $this->interests,
                'image' => Helper::getFile($this->image),
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'location' => $this->location,
                'type' => [
                    'id' => $this->type->id,
                    'name' => $this->type->name
                ]
            ],
            'user' => [
                'id' => $this->user->id,
                'first_name' => $this->user->first_name,
                'last_name' => $this->user->last_name,
                'phone' => $this->user->phone,
                'email' => $this->user->email,
                'token' => $this->user_token,
            ]
        ];
    }
}
