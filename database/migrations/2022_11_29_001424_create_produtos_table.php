<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{

    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nm_produto', 50);
            $table->text('desc_produto', 500);
            $table->decimal('vl_produto', 10, 2);
            $table->integer('qtd_produto');
            $table->integer('id_categoria')->references('categorias')->on('id');
            $table->string('img_produto')->nullable();
            $table->foreignID('fabricante_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
