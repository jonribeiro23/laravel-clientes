@extends('layouts.app', ['current' => 'produtos'])

@section('body')

    <div class="row mb-5">
        <div class="col-2">
            {{-- <a href="/produtos/novo" class="btn btn-outline-success btn-sm">Novo Produto</a> --}}
            <button onclick="novoProduto()" class="btn btn-outline-success btn-sm">Novo Produto</button>
        </div>
        <div class="col-10"></div>
    </div>


    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>

            <table class="table table-ordered table-hover">
                <thead>
                    <tr>
                        <th>Cód.</th>
                        <th>Nome</th>
                        <th>Qtd</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="bodyProdutos">
                    {{-- <tr>
                      <td></td>
                      <td></td>
                      <td>
                          <a href="/produtos/editar/" class="btn btn-outline-info btn-sm">Editar</a>
                          <a href="/produtos/apagar/" class="btn btn-outline-danger btn-sm">Apagar</a>
                      </td>
                  </tr> --}}
                </tbody>
            </table>
        </div>
    </div>



    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" class="form-horizontal" id="formProduto">
                    <div class="modal-header">
                        <h3 class="modal-title">Novo Produto</h3>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label for="nomeproduto">Nome</label>
                            <input class="form-control" type="text" id="nomeproduto" name="nome">
                        </div>

                        <div class="form-group">
                            <label for="estoque">Estoque</label>
                            <input class="form-control" type="number" id="estoque" name="estoque">
                        </div>

                        <div class="form-group">
                            <label for="preco">Preço</label>
                            <input class="form-control" type="number" id="preco" name="preco" step="0.01">
                        </div>

                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <select class="form-select form-select-sm" name="categoria" aria-label=".form-select-sm example"
                                id="categoria">
                                <option selected>Selecione uma categoria</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-outline-info btn-sm" type="submit">Salvar</button>
                            <button class="btn btn-outline-warning btn-sm" data-dissmiss='modal'>Cancelar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection

@section('javascript')
    <script>
        $.ajaxSetup({
          header: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
        })

        function carregaProdutos() {
            $.get('/api/produtos', data => {
                data = JSON.parse(data)
                data.forEach(prod => {
                    // Pegando tabela
                    let tbody = document.querySelector('#bodyProdutos')

                    //Criando tr
                    let tr = document.createElement('tr')

                    // Criando td
                    let tdId = document.createElement('td')
                    let tdNome = document.createElement('td')
                    let tdQtd = document.createElement('td')
                    let tdPreco = document.createElement('td')
                    let tdCat = document.createElement('td')
                    let tdAcoes = document.createElement('td')

                    // Criando btn
                    let btnEditar = document.createElement('button')
                    let btnDeletar = document.createElement('button')

                    // Preenchendo td
                    tdId.innerText = prod.id
                    tdNome.innerText = prod.nome
                    tdQtd.innerText = prod.stock
                    tdPreco.innerText = prod.preco
                    $.getJSON(`/api/categoria/${prod.categoria_id}`, cat => {
                        tdCat.innerText = cat.nome
                    })

                    // Preenchendo btn
                    btnEditar.innerText = 'Editar'
                    btnEditar.className = 'btn btn-outline-info mx-1'
                    btnDeletar.innerText = 'Deletar'
                    btnDeletar.className = 'btn btn-outline-danger mx-1'

                    // Anexando btn na td
                    tdAcoes.appendChild(btnEditar)
                    tdAcoes.appendChild(btnDeletar)

                    // Anexando tds na tr
                    tr.appendChild(tdId)
                    tr.appendChild(tdNome)
                    tr.appendChild(tdQtd)
                    tr.appendChild(tdPreco)
                    tr.appendChild(tdCat)
                    tr.appendChild(tdAcoes)

                    tbody.appendChild(tr)

                })
            })
        }

        function novoProduto() {
            $('#nomeproduto').val('')
            $('#preco').val('')
            $('#estoque').val('')
            $('#dlgProdutos').modal('show');

            $.get('/api/categorias', (data) => {
                data = JSON.parse(data)
                data.forEach(element => {
                    let select = document.querySelector('categoria')
                    let opc = document.createElement('option')
                    opc.value = element.id
                    opc.innerText = element.nome

                    categoria.appendChild(opc)
                });
                // console.log(typeof JSON.parse(data))
            })
        }

        $(() => {
            carregaProdutos()
        })
    </script>
@endsection
