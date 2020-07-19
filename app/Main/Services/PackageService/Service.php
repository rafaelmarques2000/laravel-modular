<?php 

namespace App\Main\Services\PackageService;

use App\Main\Services\ModuleService\Service as ModuleService;

class Service extends ModuleService{

    public function create($moduleName,$package = false){
         parent::create($moduleName,$package);
    }
}