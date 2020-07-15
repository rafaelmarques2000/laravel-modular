<?php

namespace App\Modules\Admin\Controllers;
use App\Main\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Modules\Admin\Domain\Model\Produtos;
use App\Modules\Admin\Domain\Model\Categorias;

class TesteController extends Controller
{
      public function index(Produtos $model, Categorias $categorias){

         $categorias->descricao = "teclados";
         $categorias->save();

         $model->nome = "MONITOR 32";
         $model->descricao = "1080P TOP LINHA";
         $model->preco = 3000;
         $model->categorias_id = 1;
         $model->save();

      $categoria = $categorias::find(1);
      echo "<table width='100%' border='1'>";
        echo "<tr>
          <th>Nome</th>
          <th>Descricao</th>
          <th>Preço</th>
          <th>Categoria</th>
        </tr>";
        foreach($categoria->produtos as $produto){
          $nome = $produto->nome;
          $descricao = $produto->descricao;
          $preco = $produto->preco;
          $cat = $categoria->descricao;
          echo "
              <tr>
                 <td>$nome</td>
                 <td>$descricao</td>
                 <td>$preco</td>
                 <td>$cat</td>
              </tr>
           ";
        }

      echo "</table>";


      }
}
