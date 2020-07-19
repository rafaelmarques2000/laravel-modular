<?php

namespace App\Modules\Categorias\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider{

    public function boot(){

    }

    public function register(){
         $this->registerModels();
         $this->registerRepository();
         $this->registerServices();
    }

    private function registerModels(){
        try{
            $models = dir("../app/Modules/Categorias/Domain/Model");
            while (false !== ($model = $models->read())) {
                if($model == "." || $model == ".." || $model==".gitignore"){
                   continue;
                }else{
                    $model = explode(".",$model);
                    $this->app->bind("App\\Modules\\Categorias\\Domain\Model\\".$model[0],function() use($model){
                     $instanceModel = new \ReflectionClass("\App\Modules\Categorias\Domain\Model\\".$model[0]);
                     return $instanceModel->newInstance();
                   });
                }
            }
            $models->close();
          }catch(\Exception $e){

          }
    }

    private function registerRepository(){
        $this->app->bind("App\\Modules\\Categorias\\Domain\Repository\\CategoriasRepository",function(){
            $instanceModel = new \ReflectionClass("\App\Modules\Categorias\Domain\Repository\CategoriasRepository");
            return $instanceModel->newInstance();
        });
    }

    private function registerServices(){

    }

}
