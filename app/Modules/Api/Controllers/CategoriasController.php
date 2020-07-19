<?php

namespace App\Modules\Api\Controllers;

use App\Main\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Modules\Categorias\Domain\Repository\CategoriaRepository;
use App\Modules\Categorias\Domain\DTO\Categoria;

class CategoriasController extends Controller
{
      protected $categoriaRepository;

      public function __construct(CategoriaRepository $repository)
      {
          $this->categoriaRepository = $repository;
      }

    public function ListarTodasAsCategorias(){
          try{
              return Response()->json($this->categoriaRepository->findAll());
          }catch (\Exception $e){

          }
    }

    public function BuscarCategoriaPeloId($id){
          try{
              $categoria = new Categoria();
              $categoria->setId($id);
              return Response()->json($this->categoriaRepository->find($categoria));
          }catch (\Exception $erro){

          }
    }

    public function SalvarCategoria(Request $request){
          try{
            $dados = $request->all();
            $categoria = new Categoria();
            $categoria->setDescricao($dados['descricao']);
            return Response()->json($this->categoriaRepository->save($categoria));
          }catch (\Exception $erro){

          }
    }

    public function AtualizarCategoria(Request $request,$id){
        try{
            $dados = $request->all();
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria->setDescricao($dados['descricao']);
            return Response()->json($this->categoriaRepository->update($categoria));
        }catch (\Exception $erro){

        }
    }

    public function DeletarCategoria(Request $request,$id){
        try{
            $dados = $request->all();
            $categoria = new Categoria();
            $categoria->setId($id);
            return Response()->json($this->categoriaRepository->delete($categoria));
        }catch (\Exception $erro){

        }
    }

    public function ListarProdutosDaCategoria($idCategoria){
        try{
            return Response()->json($this->categoriaRepository->ListarProdutosPorCategoria($idCategoria));
        }catch (\Exception $e){

        }
    }


}
