<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class DeviceToken extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['token', 'person_type', 'person_id', 'device_type'];

    /**
     * Get the person that owns the DeviceToken
     *
     * @return MorphTo
     */
    public function person(): MorphTo
    {
        return $this->morphTo();
    }
}
