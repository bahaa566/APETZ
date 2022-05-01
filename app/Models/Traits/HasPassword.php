<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

trait HasPassword
{
    /**
     * set the password attribute
     *
     * @return Attribute
     */
    public function password(): Attribute
    {
        return new Attribute(
            set: fn ($value) => (Hash::needsReHash($value)) ?  Hash::make($value) : $value,
        );
    }
}
