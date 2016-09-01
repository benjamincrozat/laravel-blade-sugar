<?php

namespace BC\Laravel\BladeSugar;

use Blade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the services.
     *
     * @return void
     */
    public function register()
    {
        Blade::directive('checked', function ($expression) {
            return "<?php if ($expression) echo 'checked'; ?>";
        });

        Blade::directive('csrfField', function ($expression) {
            return "<?= csrf_field(); ?>";
        });

        Blade::directive('csrfToken', function ($expression) {
            return "<?= csrf_token(); ?>";
        });

        Blade::directive('gravatar', function ($expression) {
            return "https://www.gravatar.com/avatar/<?= md5(strtolower(trim($expression))); ?>?s=128&d=mm&r=pg";
        });

        Blade::directive('markdown', function ($expression) {
            return "<?= Markdown::convertToHtml($expression); ?>";
        });

        Blade::directive('methodField', function ($expression) {
            return "<?= method_field($expression); ?>";
        });

        Blade::directive('route', function ($expression) {
            return "<?= route($expression); ?>";
        });

        Blade::directive('selected', function ($expression) {
            return "<?= $expression ? 'selected' : ''; ?>";
        });

        Blade::directive('trans', function ($expression) {
            return "<?= trans($expression); ?>";
        });

        Blade::directive('url', function ($expression) {
            return "<?= url($expression); ?>";
        });

        Blade::directive('with', function ($expression) {
            $pieces = collect(explode(',', $expression));

            $pieces = $pieces->map(function ($value, $key) {
                return trim($value, '()\' ');
            });

            return '<?php $' . $pieces[0] . ' = ' . $pieces[1] . '; ?>';
        });
    }
}
