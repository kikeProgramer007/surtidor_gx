<x-app-layout>
    <div class="pagetitle">
        <h1>Historia de Ventas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item active">Datos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                   

                        <div class="table-responsive">
                        <!-- Table with stripped rows -->
                        <table class="datatable table table-sm  table-hover table-striped ">
                            <thead >
                                <tr>
                                    <th> Id </th>
                                    <th> Fecha </th>
                                    <th> Cantidad </th>
                                    <th> Monto total </th>
                                    <th> Tipo de Pago </th>
                                    <th> Placa del Vehiculo </th>
                                    <th width="7px">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventas as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->fecha }}</td>
                                        <td>{{ $item->cantidad.' '.$item->unidad_medida }}</td>
                                        <td>{{ $item->monto_total }}</td>
                                        <td>{{ $item->tipo_pago }}</td> 
                                        <td>{{ $item->placa }}</td>
                                    
                                        <td class="py-1 align-middle text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" onclick="abrirVentanaEmergente('{{ route('venta.comprobante', ['id' => $item->id]) }}')" title="Ver comprobante"  class=" btn btn-warning"
                                                    rel="tooltip" data-placement="top"><i class="bi bi-filetype-pdf"></i></a>
                                                    <a href="#" class="btn btn-danger" rel="tooltip"
                                                    data-placement="top" title="Eliminar"
                                                    data-href="{{ route('venta.destroy', $item->id) }}"
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

<script>
    function abrirVentanaEmergente(url) {
        // Configuración de la ventana emergente
        const ancho = 800;
        const alto = 600;
        const izquierda = (window.screen.width - ancho) / 2;
        const arriba = (window.screen.height - alto) / 2;

        // Abrir la ventana emergente
        window.open(
            url, 
            'Comprobante', 
            `width=${ancho},height=${alto},top=${arriba},left=${izquierda},resizable=yes,scrollbars=yes`
        );
    }

</script>