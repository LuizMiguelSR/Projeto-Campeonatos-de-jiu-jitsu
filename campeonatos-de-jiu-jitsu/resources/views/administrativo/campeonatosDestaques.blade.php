@extends('administrativo.layouts.layout')
@section('titulo', 'Painel de Campeonatos')
@section('conteudo')
        <main class="col h-100 text-light p-4">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Create Drag and Droppable Datatables Using jQuery UI Sortable in Laravel</title>

<!-- Bootstrap 5 CDN Link  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Database CSS link ( includes Bootstrap 5 )  -->
<link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Campeonatos em destaque</h1>

                <div class="d-flex gap-2">
                    @if (auth()->user()->role === 'Admin')
                        <a href="{{ route('gerenciar_campeonatos.novo') }}" class="btn btn-light">+ Cadastrar Campeonato</a>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-end mb-3">
                <form method="get" action="{{ route('gerenciar_campeonatos.filtrar') }}" class="bg-custom rounded col-12 py-3 px-4">
                    <div class="row align-items-end row-gap-4">
                        <div class="col-3 d-flex flex-wrap">
                            <label for="search" class="col-form-label">Buscar por Título:</label>
                            <div class="col-12">
                                <input type="text" class="form-control bg-dark text-light border-dark" id="search" name="titulo" placeholder="Ex: Campeonato Santista" value="{{ request()->input('titulo') }}">
                            </div>
                        </div>

                        <div class="col-2 d-flex flex-wrap">
                            <label for="tipo" class="col-form-label">Tipo:</label>
                            <div class="col-12">
                                <select name="tipo" class="form-control bg-dark text-light border-dark form-select" id="tipo">
                                    <option value="">Selecione</option>
                                    <option value="Kimono" {{ request()->input('tipo') == 'Kimono' ? 'selected' : '' }}>Kimono</option>
                                    <option value="No-Gi" {{ request()->input('tipo') == 'No-Gi' ? 'selected' : '' }}>No-Gi</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3 d-flex flex-wrap">
                            <label for="estado" class="col-form-label">Estado:</label>
                            <div class="col-12">
                                <select name="estado" class="form-control bg-dark text-light border-dark form-select" id="estado">
                                    <option value="">Selecione um estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado }}" {{ request()->input('estado') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3 d-flex flex-wrap">
                            <label for="cidade" class="col-form-label">Cidade:</label>
                            <div class="col-12">
                                <input type="text" class="form-control bg-dark text-light border-dark" id="search" name="cidade" placeholder="Ex: Santos" value="{{ request()->input('cidade') }}">
                            </div>
                        </div>

                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-light w-100">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>
            <form method="post" action="{{ route('gerenciar_campeonatos.destaques_salvar') }}">
                @csrf
                <div class="row bg-custom rounded overflow-hidden">
                    <table id="table" class="table mb-0 table-custom table-dark align-middle">
                        <thead>
                            <tr>
                                <th scope="col" class="text-uppercase">Ordem</th>
                                <th scope="col" class="text-uppercase">Titulo</th>
                                <th scope="col" class="text-uppercase">Tipo</th>
                                <th scope="col" class="text-uppercase">Cidade</th>
                                <th scope="col" class="text-uppercase">Estado</th>
                            </tr>
                        </thead>
                        <tbody id="tablecontents">
                            @foreach ($campeonatos as $campeonato)
                                <tr cclass="row1" data-id="{{ $campeonato->id }}">
                                    <td class="pl-3"><i class="fa fa-sort"></i></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $campeonato->titulo }}</td>
                                    <td>{{ $campeonato->tipo }}</td>
                                    <td>{{ $campeonato->cidade }}</td>
                                    <td>{{ $campeonato->estado }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button id="button" type="button" class="btn btn-primary mt-3">Salvar Ordem</button>
                </div>
            </form>
  <!-- jQuery UI -->
  <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>

  <!-- Datatables Js-->
  <script type="text/javascript" src="//cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>

  <script type="text/javascript">
  $(function () {
    $("#table").DataTable();

    $( "#tablecontents" ).sortable({
      items: "tr",
      cursor: 'move',
      opacity: 0.6,
      update: function() {
          sendOrderToServer();
      }
    });

    function sendOrderToServer() {

      var order = [];
      $('tr.row1').each(function(index,element) {
        order.push({
          id: $(this).attr('data-id'),
          position: index+1
        });
      });

      $.ajax({
        type: "POST",
        dataType: "json",
        url: "{{ url('demos/sortabledatatable') }}",
        data: {
          order:order,
          _token: '{{csrf_token()}}'
        },
        success: function(response) {
            if (response.status == "success") {
              console.log(response);
            } else {
              console.log(response);
            }
        }
      });

    }
  });

</script>
        </main>
    </div>
@endsection
