@extends('layouts.app', ['current' => 'produtos']);

@section('body')
    <div class="card border">
        <div class="card-body">
            <form @if(isset($produto)) action="/produtos/salvar/{{$produto->id}}" @else action="/produtos" @endif method="post">
              @csrf

              @if(isset($produto))
                @method('PUT')
              @endif

              <div class="form-group">
                <label for="nomeproduto">Nome</label>
                <input class="form-control" type="text" id="nomeproduto" name="nome" @if(isset($produto)) value="{{$produto->nome}}" @endif>
              </div>

              <div class="form-group">
                <label for="estoque">Estoque</label>
                <input class="form-control" type="number" id="estoque" name="estoque" @if(isset($produto)) value="{{$produto->stock}}" @endif>
              </div>

              <div class="form-group">
                <label for="preco">Preço</label>
                <input class="form-control" type="number" id="preco" name="preco" step="0.01" @if(isset($produto)) value="{{$produto->preco}}" @endif>
              </div>

              <div class="form-group">
                  <label for="categoria">Categoria</label>
                  <select class="form-select form-select-sm" name="categoria" aria-label=".form-select-sm example">
                    <option selected>Selecione uma categoria</option>
                    @foreach ($categorias as $c)
                      <option value="{{$c->id}}">{{$c->nome}}</option>
                    @endforeach
                  </select>
              </div>
              <button class="btn btn-outline-info btn-sm" type="submit">Salvar</button>
              <button class="btn btn-outline-warning btn-sm" type="cancel">Cancelar</button>
            </form>
        </div>
    </div>
@endsection