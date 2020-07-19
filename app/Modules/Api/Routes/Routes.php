
<?php

Route::prefix("v1")->group(function(){
        Route::prefix("produto")->group(function(){
            Route::get("/","ProdutoController@ListarTodosOsProdutos");
            Route::get("/{id}","ProdutoController@BuscarProdutosPorId");
            Route::post("/","ProdutoController@SalvarProduto");
            Route::put("/{id}","ProdutoController@AtualizarProduto");
            Route::delete("/{id}","ProdutoController@DeletarProduto");
        });

        Route::prefix("categoria")->group(function(){
            Route::get("/","CategoriasController@ListarTodasAsCategorias");
            Route::get("/{id}","CategoriasController@BuscarCategoriaPeloId");
            Route::get("/{id}/produtos","CategoriasController@ListarProdutosDaCategoria");
            Route::post("/","CategoriasController@SalvarCategoria");
            Route::put("/{id}","CategoriasController@AtualizarCategoria");
            Route::delete("/{id}","CategoriasController@DeletarCategoria");
        });
});
