<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('nl2brWithSpacing', function ($text) {
            return "<?php echo str_replace([\"\\r\\n\", \"\\r\", \"\\n\"], '<br>', $text); ?>";
        });
    }
}
