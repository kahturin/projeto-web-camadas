<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *  title = "Requisição para nova Categoria",
 *  description = "Requisição enviada via Body para uma nova Categoria",
 *  type = "object",
 *  required = {"nome_da_categoria"}
 * )
 */

 class StoreCategoriaRequest
 {
    /**
     * @OA\Property(
     *  title = "nome da Categoria",
     *  description = "Nome da nova Categoria",
     *  example = "smartphone"
     * )
     * 
     * @var string
     */

     public $nome_da_categoria;

 }