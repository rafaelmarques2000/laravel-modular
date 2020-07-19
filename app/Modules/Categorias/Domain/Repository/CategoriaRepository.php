<?php

namespace App\Modules\Categorias\Domain\Repository;

use App\Main\Contracts\RepositoryContract;
use App\Modules\Categorias\Domain\Model\Categoria;

class CategoriaRepository implements RepositoryContract{


        protected $model = null;

        public function __construct(Categoria $categoria)
        {
            $this->model = $categoria;
        }

        public function findAll(){
             return $this->model::all();
        }

        public function find($dados){
            return $this->model->find($dados->getId());
        }

        public function save($dados){
            $this->model->descricao = $dados->getDescricao();
            $this->model->save();
        }

        public function update($dados){
            $categoria = $this->model->find($dados->getId());
            $categoria->descricao = $dados->getDescricao();
            $categoria->save();
        }

        public function delete($dados){
            $categoria = $this->model->find($dados->getId());
            $categoria->delete();
        }

        public function ListarProdutosPorCategoria($idCategoria){
            return $this->model->find($idCategoria)->produtos;
        }

}
