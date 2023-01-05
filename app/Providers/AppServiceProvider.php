<?php

namespace App\Providers;

use App\Actions\Voyager\AcaoConfirmarPagamento;
use App\Actions\Voyager\AcaoValidarFotografo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Events\Dispatcher;
use TCG\Voyager\Facades\Voyager;

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
        Voyager::addAction(AcaoConfirmarPagamento::class);
        Voyager::addAction(AcaoValidarFotografo::class);
    }

}
