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
        Blade::directive('asset', function ($expression) {
            return "<?= asset($expression); ?>";
        });

        Blade::directive('secureAsset', function ($expression) {
            return "<?= secure_asset($expression); ?>";
        });

        Blade::directive('checked', function ($expression) {
            return "<?= $expression ? 'checked' : ''; ?>";
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
            return "<?= (new Parsedown)->parse($expression); ?>";
        });

        Blade::directive('methodField', function ($expression) {
            return "<?= method_field($expression); ?>";
        });

        Blade::directive('paginationIfPages', function ($expression) {
            return '<?php if (' . $expression . '->lastPage() > 1) echo ' . $expression . '->links(); ?>';
        });

        Blade::directive('route', function ($expression) {
            return "<?= route($expression); ?>";
        });

        Blade::directive('selected', function ($expression) {
            return "<?= $expression ? 'selected' : ''; ?>";
        });

        Blade::directive('storageUrl', function ($expression) {
            $arguments = $this->getArgumentsFromExpression($expression);

            if ($arguments->count() === 2) {
                return '<?= Storage::disk("' . $arguments[0] . '")->url(' . $arguments[1] . '); ?>';
            } else {
                return '<?= Storage::disk()->url("' . $arguments[0] . '"); ?>';
            }
        });

        Blade::directive('trans', function ($expression) {
            return "<?= trans($expression); ?>";
        });

        Blade::directive('url', function ($expression) {
            return "<?= url($expression); ?>";
        });

        Blade::directive('with', function ($expression) {
            $arguments = $this->getArgumentsFromExpression($expression);

            return '<?php $' . $arguments[0] . ' = ' . $arguments[1] . '; ?>';
        });
    }

    /**
     * Get arguments from Blade directive expression.
     */
    protected function getArgumentsFromExpression(string $expression) : \Illuminate\Support\Collection
    {
        return collect(explode(',', $expression))->map(function ($value, $key) {
            return trim($value, '()\' ');
        });
    }
}
