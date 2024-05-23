<?php

namespace Amohamed\PdfPrinter;

use Illuminate\Support\ServiceProvider;

class PdfPrinterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PdfPrinter::class, function ($app) {
            return new PdfPrinter();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrapping services if needed
    }
}
