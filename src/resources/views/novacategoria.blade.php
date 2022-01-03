@extends('layouts.app', ['current' => 'categorias']);

@section('body')
    <div class="card border">
        <div class="card-body">
            <form @if(isset($categoria)) action="/categorias/salvar/{{$categoria->id}}" @else action="/categorias" @endif method="post">
              @csrf

              @if(isset($categoria))
                @method('PUT')
              @endif

              <div class="form-group">
                <label for="nomeCategoria">Nome</label>
                <input class="form-control" type="text" id="nomeCategoria" name="nome" @if(isset($categoria)) value="{{$categoria->nome}}" @endif>
              </div>
              <button class="btn btn-outline-info btn-sm" type="submit">Salvar</button>
              <button class="btn btn-outline-warning btn-sm" type="cancel">Cancelar</button>
            </form>
        </div>
    </div>
@endsection