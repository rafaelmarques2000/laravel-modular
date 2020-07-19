<?php 

namespace App\Main\Services\RepositoryService;

class Service{

      public function create($namespace){
          try{
            $moduleName = $this->getModule($namespace);
            $repositoryName = $this->getRepository($namespace);

            $repository = fopen("app/Modules/".$moduleName."/Domain/Repository/$repositoryName.php","w+");
        
            $template = file_get_contents("app/Main/Services/RepositoryService/FilesTemplates/Repository.txt");

            $process = strtr($template,[
                "{module}" => $moduleName,
                "{class}" =>$repositoryName
             ]);
     
             fwrite($repository,$process);
             fclose($repository);
             
             echo "Repositorio criado com sucesso.";
          }catch(\Exception $e){
              echo "Falha ao criar repositorio.".$e->getMessage();
          }
      }

      
      private function getRepository($namespace){
        $namespace = explode("\\",$namespace);
        return $namespace[count($namespace)-1];
     }

      private function getModule($namespace){
          $namespace = explode("\\",$namespace);
          return $namespace[count($namespace)-4];
      }


}