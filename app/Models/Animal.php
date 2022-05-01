<?php

namespace App\Models;

use App\Models\Traits\Active;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\Country
 *
 * @property int $id
 * @property array $name
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Type[] $cities
 * @property-read int|null $cities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Animal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Animal extends Model
{
    use HasFactory, HasTranslations, Active;

    public array $translatable = ['name'];

    protected $fillable = ['name', 'active'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::updated(function ($animal) {
            if (array_key_exists('active', $animal->changes)) {
                $animal->cities()->update(['active' => $animal->active]);
            }
        });
    }

    public function types()
    {
        return $this->hasMany(Type::class);
    }
}
