<x-app-layout>
    <div class="pagetitle">
        <h1>Ventas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item active">Crear</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mt-4 mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title pb-0 text-center">Datos del Vehiculo</h5>
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <label for="codigo_Bsisa" class="form-label fw-bold">B-sisa</label>
                                                <input type="text" class="form-control" id="codigo_Bsisa"
                                                    name="codigo_Bsisa" value="{{ old('codigo_Bsisa') }}">
                                                @error('codigo_Bsisa')
                                                    <div class="text-danger small">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                                <input type="hidden" class="form-control" id="id_vehiculo"
                                                    name="id_vehiculo">

                                            </div>
                                            <div class=" col-sm-6 mb-2">
                                                <label for="placa" class="form-label fw-bold">Placa</label>
                                                <input type="text" class="form-control" id="placa" name="placa"
                                                    value="{{ old('placa') }}">
                                                @error('placa')
                                                    <div class="text-danger small">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <label for="marca" class="form-label fw-bold">Marca</label>
                                                <input type="text" class="form-control" id="marca" name="marca"
                                                    value="{{ old('marca') }}">

                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <label for="color" class="form-label fw-bold">Color</label>
                                                <input type="text" class="form-control" id="color" name="color"
                                                    value="{{ old('color') }}">
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <label for="tipo_vehiculo" class="form-label fw-bold">Tipo de
                                                    vehiculo</label>
                                                <input type="text" class="form-control" id="tipo_vehiculo"
                                                    name="tipo_vehiculo" value="{{ old('tipo_vehiculo') }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card mt-4">
                                    <div class="card-body">
                                        <h5 class="card-title pb-0 text-center">Datos del Cliente</h5>
                                        <div class="row">

                                            <div class="col-md-7 mb-3">
                                                <label for="nombreCliente" class="form-label fw-bold">Nombres</label>
                                                <input type="text" class="form-control" id="nombreCliente"
                                                    name="nombreCliente" value="">
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <label for="ci" class="form-label fw-bold">Cedula Identidad
                                                </label>
                                                <input type="number" class="form-control" id="ci"name="ci"
                                                    value="">
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <label for="paterno" class="form-label fw-bold">Ap. Paterno</label>
                                                <input type="text" class="form-control" id="paterno" name="paterno"
                                                    value="{{ old('paterno') }}">

                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <label for="materno" class="form-label fw-bold">Ap. Materno</label>
                                                <input type="text" class="form-control" id="materno" name="materno"
                                                    value="{{ old('materno') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="card mt-4 mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title pb-0 text-center">Forma de pago</h5>
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod"
                                                    id="qr" value="qr">
                                                <label class="form-check-label fw-bold" for="qr">QR</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod"
                                                    id="efectivo" value="efectivo">
                                                <label class="form-check-label fw-bold"
                                                    for="efectivo">Efectivo</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod"
                                                    id="tarjeta" value="tarjeta">
                                                <label class="form-check-label fw-bold" for="tarjeta">Tarjeta</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mt-0">
                                    <div class="card-body">
                                        <h5 class="card-title pb-0 text-center">Datos del Comustible</h5>
                                        <div class="col-12 mb-3">
                                            <label for="id_bomba" class="form-label fw-bold"><i
                                                    class="bi bi-fuel-pump"></i> Bombas</label>
                                            <select class="form-select" id="id_bomba" name="id_bomba" required>
                                                <option selected disabled value="">Seleccionar</option>
                                                @foreach ($bombas as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->descripcion . ', ' . $item->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_bomba')
                                                <small class="text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="nivel_actual" class="form-label fw-bold">Nivel Actual (Lts)</label>
                                            <input type="text" class="form-control" id="nivel_actual"
                                                name="nivel_actual" value="{{ old('nivel_actual') }}">
                                            @error('nivel_actual')
                                                <div class="text-danger small">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="precio" class="form-label fw-bold">Precio</label>
                                            <input type="text" class="form-control" id="precio" name="precio"
                                                value="{{ old('precio') }}">
                                            @error('precio')
                                                <div class="text-danger small">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

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
    $(document).ready(function() {

        function limpiarCampos() {
            $("#id_vehiculo").val(""); // Campo oculto
            $("#codigo_Bsisa").val(""); // Campo visible
            $("#placa").val(""); // Placa
            $("#marca").val(""); // Marca
            $("#color").val(""); // Color
            $("#nombreCliente").val(""); // Nombre del cliente
            $("#paterno").val(""); // Apellido paterno
            $("#materno").val(""); // Apellido materno
            $("#ci").val(""); // CI
            $("#tipo_vehiculo").val(""); // Tipo de vehículo
        }

        $("#codigo_Bsisa").autocomplete({
            source: '{{ route('vehiculo.autocomplete') }}', // Ruta definida en Laravel
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                $("#id_vehiculo").val(ui.item.id); // Asigna el ID al campo oculto
                $("#codigo_Bsisa").val(ui.item.value);
                $("#placa").val(ui.item.placa);
                $("#marca").val(ui.item.marca);
                $("#color").val(ui.item.color);
                $("#nombreCliente").val(ui.item.nombre);
                $("#paterno").val(ui.item.paterno);
                $("#materno").val(ui.item.materno);
                $("#ci").val(ui.item.ci);
                $("#tipo_vehiculo").val(ui.item.tipo_vehiculo);
            },
            change: function(event, ui) {
                // Si el campo es cambiado manualmente y no se encuentra el valor, establece id_cliente a 0
                if (!ui.item) {
                    limpiarCampos(); // Llama a la función para limpiar los datos
                }
            }
        });

        // Manejo del evento keydown para detectar la tecla DEL
        $("#codigo_Bsisa").keydown(function(event) {
            if (event.key === "Delete") { // Verifica si la tecla presionada es "DEL"
                limpiarCampos();
            }
        });




    });


    $(document).ready(function () {
        $("#id_bomba").on("change", function () {
            const valorSeleccionado = $(this).val(); // Obtén el valor seleccionado

            // Verifica que no esté vacío
            if (valorSeleccionado) {
                // Realiza la llamada AJAX
                $.ajax({
                    url: '{{ url('') }}/bomba/search/' + valorSeleccionado, // Ruta al controlador en tu servidor
                    method: 'GET', // Método HTTP
                    success: function (respuesta) {
                        console.log(respuesta); // Verifica la respuesta en la consola
                        
                        // Asegúrate de que la respuesta sea válida
                        if (respuesta) {
                            // Asigna el valor al input con id="precio"
                            $("#precio").val(respuesta.descripcionTanque);
                            $("#nivel_actual").val(respuesta.nivel_actual);
                        } else {
                            alert("No se encontró el registro o el nivel actual.");
                        }
                    },
                    error: function (xhr, status, error) {
                        // Manejo de errores
                        console.error("Error:", error);
                        alert("Ocurrió un error al obtener los datos.");
                    }
                });
            } else {
                // Limpia el input si no hay selección
                $("#precio").val('');
            }
        });
    });
</script>
