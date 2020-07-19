<?php

namespace App\Modules\Api\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadRoutes();
        $this->loadViewsFrom(__DIR__."../Views","api");
    }

    public function register(){

    }

    private function loadRoutes(){
        Route::group([
            "middleware"=>"web",
            "namespace"=>"App\Modules\Api\Controllers",
            "prefix"=>"api",
            "as"=>"api."
        ],function($router){
            require app_path("Modules/Api/Routes/Routes.php");
        });
    }



}
