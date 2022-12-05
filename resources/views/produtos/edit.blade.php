@extends('layouts.dash')
@section('corpo-dash')
    <div class="row justify-content-center">
        <h1 class="text-center">Edição de Produto</h1>
    </div>
    <form method="POST" action="{{ Route('produto.update', $produto->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <span class="form-label">Nome</span>
            <input type="text" name="nm_produto" class="form-control" value="{{ $produto->nm_produto }}">
        </div>
        <div class="form-group">
            <span class="form-label">Descrição</span>
            <textarea class="form-control" name="desc_produto">{{ $produto->desc_produto }}</textarea>
        </div>
        <div class="form-group">
            <span class="form-label">Preço</span>
            <input type="number" min="0.00" max="10000.00" name="vl_produto" step="0.01" value="{{ $produto->vl_produto }}"
                class="form-control">
        </div>
        <div class="form-group">
            <span class="form-label">Quantidade</span>
            <input type="number" min="1" max="10000" name="qtd_produto" step="1" class="form-control"
                value="{{ $produto->qtd_produto }}">
        </div>
        <label for="id_categoria">Categoria</label>
        <select name="id_categoria" id="id_categoria" class="form-control">
            <option selected value="{{ $categoria->id }}">{{ $categoria->nm_categoria }}</option>
            @foreach ($categorias as $c)
                <option value="{{ $c->id }}">{{ $c->nm_categoria }}</option>
            @endforeach
        </select>
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-success btn-md">Salvar</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-warning btn-md">Cancelar</a>
        </div>
    </form>
@endsection