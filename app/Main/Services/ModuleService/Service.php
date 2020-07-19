<?php 

namespace App\Main\Services\ModuleService;

class Service{

    /**
     * Create Module Command Service
     * @param $moduleName
     * @return bool
     */
    public function create($moduleName,$package = false){
        try{ 

            if($this->CheckModuleExits($moduleName)){
                throw new \Exception("Modulo já existe.");
            }

            if($this->createFolders($moduleName,$package)){
                if($this->createFiles($moduleName,$package)){
                    echo "Modulo criado com sucesso.";
                    return true;
                }else{
                    throw new \Exception("Falha ao criar arquivos");
                }
            }else{
                throw new \Exception("Falha ao criar pastas");
            }
        }catch(\Exception $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function ChoiceFolderTypeModuleOrPackage($package){
        $folders = [
            "Controllers",
            "Domain"=>["Model","Repository"],
            "Providers",
            "Routes",
            "Services",
            "Views"];
        
        if($package){
            $folders = [
                    "Domain"=>["Model","Repository"],
                    "Providers",
                    "Services",
                ];
        }

        return $folders;
    }


    /**
     * Create folders Module
     * @param string $moduleName
     * @return bool
     */
    private function createFolders($moduleName,$package){
        try{
           
            $folders = $this->ChoiceFolderTypeModuleOrPackage($package);
 
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

    private function createFiles($moduleName,$package){
        try{
            if(!$package){ 
              $this->createRouteFile($moduleName);
            }
            $this->createProviderFile($moduleName,$package);
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

    private function createProviderFile($moduleName,$package){
        $provider = fopen("app/Modules/".$moduleName."/Providers/ModuleServiceProvider.php","w+");
        
        $typeBuildModule = $package ?"PackageService":"ModuleService";
        
        $template = file_get_contents("app/Main/Services/$typeBuildModule/FilesTemplates/Provider.txt");

        $process = strtr($template,[
           "{namespace_module}" => $moduleName,
           "{view_module}" =>strtolower($moduleName),
           "{controller_module}"=>$moduleName,
           "{prefixo}" =>strtolower($moduleName),
           "{route_module}"=>$moduleName
        ]);

        fwrite($provider,$process);
        fclose($provider);
    }

    private function CheckModuleExits($moduleName){
        return file_exists("app/Modules/".$moduleName);
    }

}