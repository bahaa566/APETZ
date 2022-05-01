<?php

namespace App\Models;

use App\Models\Traits\Active;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Type
 *
 * @property int $id
 * @property array $name
 * @property int $active
 * @property int $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Animal $country
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    use HasFactory, HasTranslations, Active;

    public array $translatable = ['name'];

    protected $fillable = ['name', 'animal_id', 'active'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    /**
     * Scope a query to only include ofCountry
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeOfAnimal($query, $animal_id)
    {
        if ($animal_id)
            $query->where('animal_id', $animal_id);
    }
}
