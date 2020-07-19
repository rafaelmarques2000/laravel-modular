<?php

namespace App\Main\Contracts;

interface RepositoryContract{
     public function findAll();
     public function find($dados);
     public function save($dados);
     public function update($dados);
     public function delete($dados);
}
