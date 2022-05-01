<?php

namespace App\Models\Traits;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Http\UploadedFile;

trait HasImage
{

    /**
     * set the image attribute
     *
     * @return Attribute
     */
    function image(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Helper::getFile($value),
            set: fn ($value) => ($value instanceof UploadedFile) ?  Helper::uploadFile($value, $this->path ?? 'uploads') : $value
        );
    }
}
