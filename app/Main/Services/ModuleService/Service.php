<?php 

namespace App\Main\Services\ModuleService;

class Service{

    /**
     * Create Module Command Service
     * @param $moduleName
     * @return bool
     */
    public function create($moduleName){
        try{ 
            if($this->createFolders($moduleName)){
                if($this->createFiles($moduleName)){
                    return true;
                }else{
                    throw new \Exception("Falha ao criar arquivos");
                }
            }else{
                throw new \Exception("Falha ao criar pastas");
            }
        }catch(\Exception $e){
            return false;
        }
    }

    /**
     * Create folders Module
     * @param string $moduleName
     * @return bool
     */
    private function createFolders($moduleName){
        try{
           $folders = [
               "Controllers",
               "Domain"=>["Model","Repository"],
               "Providers",
               "Routes",
               "Services",
               "Views"];
           
           if(mkdir("app/Modules/".$moduleName)){
                 foreach($folders as $key=>$folder){
                     if(is_int($key)){
                        mkdir("app/Modules/".$moduleName."/".$folder);
                     }else{
                        mkdir("app/Modules/".$moduleName."/".$key);
                        $subfolders = $folder;
                        foreach($subfolders as $sub){
                            mkdir("app/Modules/".$moduleName."/".$key."/".$sub);
                        }
                     }
                 }
           }else{
              throw new \Exception("Falha ao criar pastas");
           }
           return true; 
        }catch(\Exception $e){
            return false;
        }
    }

    private function createFiles($moduleName){
        try{
            $this->createRouteFile($moduleName);
            $this->createProvider($moduleName);
            return true;
        }catch(\Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    private function createRouteFile($moduleName){
        $route = fopen("app/Modules/".$moduleName."/Routes/Routes.php","w+");
        $template = file_get_contents("app/Main/Services/ModuleService/FilesTemplates/Router.txt");
        $process = strtr($template,[
            "{modulo}" =>strtolower($moduleName)
         ]);

        fwrite($route,$process);
        fclose($route);
    } 

    private function createProvider($moduleName){
        $provider = fopen("app/Modules/".$moduleName."/Providers/ModuleServiceProvider.php","w+");

        $template = file_get_contents("app/Main/Services/ModuleService/FilesTemplates/Provider.txt");

        $process = strtr($template,[
           "{namespace_module}" => $moduleName,
           "{view_module}" =>strtolower($moduleName),
           "{controller_module}"=>$moduleName,
           "{prefixo}" =>strtolower($moduleName),
           "{prefixo}" =>strtolower($moduleName),
           "{route_module}"=>$moduleName
        ]);

        fwrite($provider,$process);
        fclose($provider);
    }

}