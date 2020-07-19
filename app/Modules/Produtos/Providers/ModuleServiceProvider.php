<?php 

namespace App\Modules\Produtos\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ModuleServiceProvider extends ServiceProvider{

    public function boot(){
       
    }

    public function register(){
         $this->registerModels();
         $this->registerRepository();
    }

    private function registerModels(){
        try{ 
            $models = dir("../app/Modules/Produtos/Domain/Model");
            while (false !== ($model = $models->read())) {
                if($model == "." || $model == ".." || $model==".gitignore"){ 
                   continue;  
                }else{
                    $model = explode(".",$model);
                    $this->app->bind("App\\Modules\\Produtos\\Domain\Model\\".$model[0],function() use($model){
                     $instanceModel = new \ReflectionClass("\App\Modules\Produtos\Domain\Model\\".$model[0]);
                     return $instanceModel->newInstance();
                   });            
                }
            }
            $models->close(); 
          }catch(\Exception $e){
              
          }
    }

    private function registerRepository(){
        $this->app->bind("App\\Modules\\Produtos\\Domain\Repository\\ProdutosRepository",function(){
            $instanceModel = new \ReflectionClass("\App\Modules\Produtos\Domain\Repository\ProdutosRepository");
            return $instanceModel->newInstance();
        });            
    }

}
