<?php

namespace App\Modules\Api\Controllers;

use App\Main\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Modules\Produtos\Domain\Repository\ProdutoRepository;
use App\Modules\Produtos\Domain\DTO\Produto;
use App\Modules\Categorias\Services\CategoriasServices;

class ProdutoController extends Controller
{
    protected $repository;

    public function __construct(ProdutoRepository $repository){
        $this->repository = $repository;
    }

    public function ListarTodosOsProdutos(){
         return Response()->json($this->repository->findAll());
    }

    public function BuscarProdutosPorId($id){
        try{
            $produto = new Produto();
            $produto->setId($id);
            return Response()->json($this->repository->find($produto));
        }catch(\Exception $erro){

        }
    }

    public function SalvarProduto(Request $request){
        try{
            $data = $request->all();
            $produto = new Produto();
            $produto->setNome($data['nome']);
            $produto->setDescricao($data['descricao']);
            $produto->setPreco($data['preco']);
            $produto->setEstoque($data['estoque']);
            $produto->setCategoriaId($data['categoria_id']);

            $response = $this->repository->save($produto);
            return Response()->json($response);

        }catch(\Exception $erro){
            echo $erro->getMessage();
        }
    }

    public function AtualizarProduto(Request $request,$id){
        try{
            $data = $request->all();

            $produto = new Produto();
            $produto->setId($id);
            $produto->setNome($data['nome']);
            $produto->setDescricao($data['descricao']);
            $produto->setPreco($data['preco']);
            $produto->setEstoque($data['estoque']);
            $produto->setCategoriaId($data['categoria_id']);

            $response = $this->repository->update($produto);
            return Response()->json($response);

        }catch(\Exception $erro){
            echo $erro->getMessage();
        }
    }



    public function DeletarProduto($id){
        try{
            $produto = new Produto();
            $produto->setId($id);
            return Response()->json($this->repository->delete($produto));
        }catch(\Exception $e){

        }
    }


}

