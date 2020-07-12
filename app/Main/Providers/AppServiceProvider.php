<?php

namespace App\Main\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadModules();
        $this->registerServices();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function loadModules(){
       try{ 
        $modules = dir("../app/Modules");
        while (false !== ($module = $modules->read())) {
            if($module == "." || $module == ".."){ 
               continue;  
            }else{
                $this->app->register("App\\Modules\\".$module."\\Providers\ModuleServiceProvider");
            }
        }
        $modules->close(); 
      }catch(\Exception $e){
          
      }
    }

    private function registerServices(){
        /**
         * Registrar o serviço para o command
         */
        $this->app->bind("App\\Main\\Services\\ModuleService\Service",function(){
            return new \App\Main\Services\ModuleService\Service();
        });
    }
}
