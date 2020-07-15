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
         $this->registerModels();
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

    private function registerModels(){
        try{ 
            $models = dir("../app/Modules/Api/Domain/Model");
            while (false !== ($model = $models->read())) {
                if($model == "." || $model == ".." || $model==".gitignore"){ 
                   continue;  
                }else{
                    $model = explode(".",$model);
                    $this->app->bind("App\\Modules\\Api\\Domain\Model\\".$model[0],function() use($model){
                     $instanceModel = new \ReflectionClass("\App\Modules\Api\Domain\Model\\".$model[0]);
                     return $instanceModel->newInstance();
                   });            
                }
            }
            $models->close(); 
          }catch(\Exception $e){
              
          }
    }

}
