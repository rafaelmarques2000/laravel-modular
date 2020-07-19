<?php

namespace App\Modules\Produtos\Domain\Repository;

use App\Main\Contracts\RepositoryContract;
use App\Modules\Produtos\Domain\Model\Produto;


class ProdutoRepository implements RepositoryContract{

        protected $model = null;

        public function __construct(Produto $produto){
             $this->model = $produto;
        }

        public function findAll(){
            return $this->model::all();
        }

        public function find($dados){
            return $this->model->find($dados->getId())->categoria;
        }

        public function save($dados){
            $this->model->nome = $dados->getNome();
            $this->model->descricao = $dados->getDescricao();
            $this->model->preco = $dados->getPreco();
            $this->model->estoque = $dados->getEstoque();
            $this->model->categoria_id = $dados->getCategoriaId();
            $this->model->save();
        }

        public function update($dados){
            $produto = $this->model->find($dados->getId());
            $produto->nome = $dados->getNome();
            $produto->descricao = $dados->getDescricao();
            $produto->preco = $dados->getPreco();
            $produto->estoque = $dados->getEstoque();
            $produto->categoria_id = $dados->getCategoriaId();
            $produto->save();
        }

        public function delete($dados){
            $produto = $this->model->find($dados->getId());
            $produto->delete();
        }

}
