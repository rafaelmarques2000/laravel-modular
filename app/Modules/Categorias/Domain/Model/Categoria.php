<?php

namespace App\Modules\Categorias\Domain\Model;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Produtos\Domain\Model\Produto;

class Categoria extends Model
{

        public function produtos(){
            return $this->hasMany(Produto::class);
        }

}
