<?php

namespace App\Providers;

use App\Models\{Captain, User};
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::enforceMorphMap($this->getMorphMap());
    }


    public function getMorphMap(): array
    {
        return collect(\File::allFiles(app_path('Models')))
            ->mapWithKeys(function ($file) {
                $filename = $file->getFilenameWithoutExtension();
                $key = \Str::lower($filename);
                $value = "App\\Models\\{$filename}";
                return [$key => $value];
            })->toArray();
    }
}
