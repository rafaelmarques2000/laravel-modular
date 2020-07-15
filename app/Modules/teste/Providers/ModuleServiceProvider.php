<?php 

namespace App\Modules\teste\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider{

    public function boot(){
        $this->loadRoutes();
        $this->loadViewsFrom(__DIR__."../Views","teste");
    }

    public function register(){
         $this->registerModels();
    }

    private function loadRoutes(){
        Route::group([
            "middleware"=>"web",
            "namespace"=>"App\Modules\teste\Controllers",
            "prefix"=>"teste",
            "as"=>"teste."
        ],function($router){
            require app_path("Modules/teste/Routes/Routes.php");
        });
    }

    private function registerModels(){
        try{ 
            $models = dir("../app/Modules/teste/Domain/Model");
            while (false !== ($model = $models->read())) {
                if($model == "." || $model == ".." || $model==".gitignore"){ 
                   continue;  
                }else{
                    $model = explode(".",$model);
                    $this->app->bind("App\\Modules\\teste\\Domain\Model\\".$model[0],function() use($model){
                     $instanceModel = new \ReflectionClass("\App\Modules\teste\Domain\Model\\".$model[0]);
                     return $instanceModel->newInstance();
                   });            
                }
            }
            $models->close(); 
          }catch(\Exception $e){
              
          }
    }

}
