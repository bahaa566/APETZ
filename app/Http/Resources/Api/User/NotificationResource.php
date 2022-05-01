<?php

namespace App\Http\Resources\Api\User;

// use App\Http\Resources\Api\BaseCollection;

use App\Helpers\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'      => $this->id,
            'type'    => $this->type,
            'body'    => (array)Helper::getLocaleFromJson($this->data),
            'read_at' => (string)$this->read_at,
        ];
    }
}
