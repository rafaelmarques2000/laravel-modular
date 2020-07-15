<?php

namespace App\Modules\Admin\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Admin\Domain\Model\Produtos;

class Categorias extends Model
{
      public function produtos(){
           return $this->hasMany(Produtos::class);
      }
}
