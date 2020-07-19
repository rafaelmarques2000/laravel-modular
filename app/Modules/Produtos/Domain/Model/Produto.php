<?php

namespace App\Modules\Produtos\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Categorias\Domain\Model\Categoria;

class Produto extends Model
{
    
      public function categoria(){
          return $this->belongsTo(Categoria::class);
      }

      public function EstaDisponivelParaVenda(){
          return $this->estoque > 0;
      }



}
