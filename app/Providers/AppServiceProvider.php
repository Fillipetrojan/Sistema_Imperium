<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Models\Tipo_Produto;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        //Menu Cliente
        View::composer("menu.menu_cliente", function ($view)
        {
            $tipo_produto=Tipo_Produto::all();
            $view->with("tipo_produto", $tipo_produto);
        });


    }
}
