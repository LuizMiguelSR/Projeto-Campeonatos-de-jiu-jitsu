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
                    <a href="#" class="btn btn-light" title="PDF">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                        </svg>
                    </a>

                    <a href="#" class="btn btn-light" title="Excel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                            <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                        </svg>
                    </a>
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
