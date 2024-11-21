<x-app-layout>
    <div class="pagetitle">
        <h1>Turnos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Turnos</li>
                <li class="breadcrumb-item active">Datos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="card-title pb-0">
                            <div class="mb-0">
                                <a class="btn btn-primary btn-sm" href="{{ route('turno.create') }}"><i
                                        class="bi bi-people me-1"></i>&nbsp;&nbsp;Agregar</a>
                            </div>

                        </div>

                        <div class="table-responsive">
                        <!-- Table with stripped rows -->
                        <table class="datatable table table-sm  table-hover table-striped ">
                            <thead >
                                <tr>
                                    <th>Id.</th>
                                    <th>Descripcion</th>
                                    <th data-type="datetime" data-format="YYYY/MM/DD HH:mm">Inicio Turno</th>
                                    <th data-type="datetime" data-format="YYYY/MM/DD HH:mm">Fin Turno</th>
                                    <th>
                                        <b>N</b>ombre Completo
                                    </th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($turnos as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->inicio_turno }}</td>
                                        <td>{{ $item->fin_turno }}</td>
                                        <td>{{ $item->nombre.' '.$item->paterno.' '.$item->materno }}</td>
                                        <td class="py-1 align-middle text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('turno.edit', $item->id) }}" class="btn btn-info"
                                                    rel="tooltip" data-placement="top" title="Editar"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a href="#" class="btn btn-danger" rel="tooltip"
                                                    data-placement="top" title="Eliminar"
                                                    data-href="{{ route('turno.destroy', $item->id) }}"
                                                    data-bs-toggle="modal" data-bs-target="#modal-confirma"><i
                                                        class="bi bi-trash3-fill"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


        <div class="modal fade" id="modal-confirma" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
              <div class="modal-header p-2">
                <h5 class="modal-title">Eliminar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>¿Desea Eliminar este registro?</p>
              </div>
              <div class="modal-footer p-2">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok btn-sm">Confirmar</a>
              </div>
            </div>
          </div>
        </div><!-- End Vertically centered Modal-->

    
</x-app-layout>
