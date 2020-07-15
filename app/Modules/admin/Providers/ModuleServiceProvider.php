<?php 

namespace App\Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadRoutes();
        $this->loadViewsFrom(__DIR__."../Views","admin");
    }

    public function register(){
        $this->registerModels();
    }

    private function loadRoutes(){
        Route::group([
            "middleware"=>"web",
            "namespace"=>"App\Modules\Admin\Controllers",
            "prefix"=>"admin",
            "as"=>"admin."
        ],function($router){
            require app_path("Modules/Admin/Routes/Routes.php");
        });
    }

    private function registerModels(){
        try{ 
            $models = dir("../app/Modules/Admin/Domain/Model");
            while (false !== ($model = $models->read())) {
                if($model == "." || $model == ".." || $model==".gitignore"){ 
                   continue;  
                }else{
                    $model = explode(".",$model);
                    $this->app->bind("App\\Modules\\Admin\\Domain\Model\\".$model[0],function() use($model){
                     $instanceModel = new \ReflectionClass("\App\Modules\Admin\Domain\Model\\".$model[0]);
                     return $instanceModel->newInstance();
                   });            
                }
            }
            $models->close(); 
          }catch(\Exception $e){
              
          }
    }

}
