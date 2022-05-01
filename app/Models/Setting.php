<?php

namespace App\Models;

use App\Traits\HasEnhancedTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, HasEnhancedTranslations;

    public array $translatable = ['value'];
    protected $fillable = ['value'];

    public function getTranslationsArray(): array
    {
        return $this->getTranslations('value');
    }
}
