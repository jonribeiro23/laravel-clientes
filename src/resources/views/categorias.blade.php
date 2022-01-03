@extends('layouts.app', ['current' => 'categorias'])

@section('body')

    <div class="row mb-5">
      <div class="col-2">
        <a href="/categorias/novo" class="btn btn-outline-success btn-sm">Nova Categoria</a>
      </div>
      <div class="col-10"></div>
    </div>

    @if (count($categorias) > 0)
        <div class="card border">
            <div class="card-body">
                <h5 class="card-title">Cadastro de Categorias</h5>

                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Cód.</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->nome }}</td>
                                <td>
                                    <a href="/categorias/editar/{{ $cat->id }}"
                                        class="btn btn-outline-info btn-sm">Editar</a>
                                    <a href="/categorias/apagar/{{ $cat->id }}"
                                        class="btn btn-outline-danger btn-sm">Apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h3>Nenhuma categoria cadastrada</h3>
    @endif
@endsection
