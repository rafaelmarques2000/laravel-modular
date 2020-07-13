<?php 

namespace App\Modules\admin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadRoutes();
        $this->loadViewsFrom(__DIR__."../Views","admin");
    }

    public function register(){
        
    }

    private function loadRoutes(){
        Route::group([
            "middleware"=>"web",
            "namespace"=>"App\Modules\admin\Controllers",
            "prefix"=>"admin",
            "as"=>"admin."
        ],function($router){
            require app_path("Modules/admin/Routes/Routes.php");
        });
    }

}
