<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Active
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder $builder
     * @return void
     */
    public function scopeActive(Builder $builder)
    {
        $builder->where('active', true);
    }
}
