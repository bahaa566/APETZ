<?php

namespace App\Models;

use App\Models\Traits\HasImage;
use File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $image
 * @property int $advertisement_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Advertisement $advertisement
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereAdvertisementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    use HasFactory, HasImage;

    protected $fillable = ['image', 'pet_id'];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($image) {
            if (File::exists(public_path($image->path))) {
                File::delete(public_path($image->path));
            }
        });
    }


    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
