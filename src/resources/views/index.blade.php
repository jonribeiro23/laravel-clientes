@extends('layouts.app', ['current' => 'home'])

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck" style="padding: 2%;">

                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de produtos</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo quo
                            nam velit quae possimus perspiciatis mollitia ab repellendus quasi? Voluptate totam beatae
                            quasi a dicta vero aliquam at quidem cupiditate?</p>
                        <a href="/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                    </div>
                </div>

                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo quo nam
                            velit quae possimus perspiciatis mollitia ab repellendus quasi? Voluptate totam beatae quasi a
                            dicta vero aliquam at quidem cupiditate?</p>
                        <a href="/produtos" class="btn btn-primary">Cadastre suas categorias</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
