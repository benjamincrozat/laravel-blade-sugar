<?php

namespace BC\Laravel\BladeSugar;

use Illuminate\Support\Facades\Blade;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the services.
     */
    public function boot()
    {
        Blade::directive('asset', function ($expression) {
            return "<?php echo asset($expression); ?>";
        });

        Blade::directive('secureAsset', function ($expression) {
            return "<?php echo secure_asset($expression); ?>";
        });

        Blade::directive('checked', function ($expression) {
            return "<?php echo $expression ? 'checked' : ''; ?>";
        });

        Blade::directive('gravatar', function ($expression) {
            return "https://www.gravatar.com/avatar/<?php echo md5(strtolower(trim($expression))); ?>?s=128&d=mm&r=pg";
        });

        Blade::directive('markdown', function ($expression) {
            return "<?php echo (new Parsedown)->parse($expression); ?>";
        });

        Blade::directive('route', function ($expression) {
            return "<?php echo route($expression); ?>";
        });

        Blade::directive('selected', function ($expression) {
            return "<?php echo $expression ? 'selected' : ''; ?>";
        });

        Blade::directive('storageUrl', function ($expression) {
            $arguments = $this->getArguments($expression);

            $first = $this->trimArgument($arguments[0]);

            if (2 === $arguments->count()) {
                return '<?php echo Storage::disk("' . $first . '")->url(' . $arguments[1] . '); ?>';
            } else {
                return '<?php echo Storage::disk()->url("' . $first . '"); ?>';
            }
        });

        Blade::directive('url', function ($expression) {
            return "<?php echo url($expression); ?>";
        });

        Blade::directive('with', function ($expression) {
            $arguments = $this->getArguments($expression);

            $first = $this->trimArgument($arguments[0]);

            return '<?php $' . $first . ' = ' . $arguments[1] . '; ?>';
        });
    }

    protected function getArguments($expression)
    {
        return collect(explode(',', $expression));
    }

    protected function trimArgument($argument)
    {
        return trim($argument, '\'" ');
    }
}
