<?php

namespace App\Traits;

use Spatie\Translatable\HasTranslations;

trait HasEnhancedTranslations
{
    use HasTranslations;

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

}
