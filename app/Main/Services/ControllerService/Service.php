<?php 

namespace App\Main\Services\ControllerService;

class Service{

     public function create($namespace){
        try{

        if(!$this->CheckModuleExits($namespace)){
            echo "Modulo não encontrado";
            return false;
        }

        $template = file_get_contents("app/Main/Services/ControllerService/FilesTemplates/Controller.txt");
        
        $templateProcess = strtr($template,[
            "{package}" => $this->GetModule($namespace),
            "{class_name}" =>$this->GetController($namespace),
         ]);
        
        $controller = fopen($namespace.".php","w+");
        fwrite($controller,$templateProcess);
        fclose($controller);
        
        echo "Controller criado com sucesso";
        return true;
        
        }catch(\Exception $e){
            echo $e->getMessage(); 
            return false;
        }
     }

     private function GetController($namespace){
        $array = explode("\\",$namespace);
        return $array[count($array)-1];
     }

     private function GetModule($namespace){
        $array = explode("\\",$namespace);
        return $array[count($array)-3];
     }

     private function CheckModuleExits($namespace){
         $array = explode("\\",$namespace);
         $module = $array[count($array)-3];
         return file_exists("app/Modules/".$module);
     }

}