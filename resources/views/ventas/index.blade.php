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
                    <form id="ventaForm" action="{{ route('venta.store') }}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-md-4">
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
                                            <label for="nombreCombustible" class="form-label fw-bold">Combustible</label>
                                            <input type="text" class="form-control" id="nombreCombustible"
                                                name="nombreCombustible" value="{{ old('nombreCombustible') }}" disabled>
                                            @error('nombreCombustible')
                                            <div class="text-danger small">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="nivel_actual" class="form-label fw-bold">Nivel Actual (Lts)</label>
                                            <input type="text" class="form-control" id="nivel_actual"
                                                name="nivel_actual" value="{{ old('nivel_actual') }}" disabled>
                                            @error('nivel_actual')
                                            <div class="text-danger small">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="precio" class="form-label fw-bold">Precio</label>
                                            <input type="number" class="form-control" id="precio" name="precio"
                                                value="{{ old('precio') }}" disabled>
                                            @error('precio')
                                            <div class="text-danger small">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <input type="hidden" class="form-control" id="id_tanque" name="id_tanque" value="" >
                                        
                                    </div>
                                </div>
                            </div>


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
                                                    value="{{ old('placa') }}" disabled>
                                                @error('placa')
                                                <div class="text-danger small">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <label for="marca" class="form-label fw-bold">Marca</label>
                                                <input type="text" class="form-control" id="marca" name="marca"
                                                    value="{{ old('marca') }}" disabled>

                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <label for="color" class="form-label fw-bold">Color</label>
                                                <input type="text" class="form-control" id="color" name="color"
                                                    value="{{ old('color') }}" disabled>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <label for="tipo_vehiculo" class="form-label fw-bold">Tipo de
                                                    vehiculo</label>
                                                <input type="text" class="form-control" id="tipo_vehiculo"
                                                    name="tipo_vehiculo" value="{{ old('tipo_vehiculo') }}" disabled>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="card mt-4">
                                    <div class="card-body">
                                        <h5 class="card-title pb-0 text-center">Datos del Cliente</h5>
                                        <div class="row">

                                            <div class="col-md-6 mb-3">
                                                <label for="nombreCliente" class="form-label fw-bold">Nombres</label>
                                                <input type="text" class="form-control" id="nombreCliente"
                                                    name="nombreCliente" value="" disabled>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="ci" class="form-label fw-bold">Cedula Identidad
                                                </label>
                                                <input type="number" class="form-control" id="ci" name="ci"
                                                    value="" disabled>
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <label for="paterno" class="form-label fw-bold">Ap. Paterno</label>
                                                <input type="text" class="form-control" id="paterno" name="paterno"
                                                    value="{{ old('paterno') }}" disabled>

                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <label for="materno" class="form-label fw-bold">Ap. Materno</label>
                                                <input type="text" class="form-control" id="materno" name="materno"
                                                    value="{{ old('materno') }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                
                                    <div class="col-ms-6 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title pb-0 text-center">Datos de la Venta</h5>
                                                <div class="col-md-12 mb-3">
                                                    <label for="cantidad" class="form-label fw-bold">Cantidad a Vender(Lts)</label>
                                                    <input type="number" class="form-control" id="cantidad" name="cantidad" oninput="calcularTotal()"
                                                        value="{{ old('cantidad') }}">
                                                    @error('cantidad')
                                                    <div class="text-danger small">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="input-group input-group-lg">
                                                    <span class="input-group-text fw-bold" id="inputGroup-sizing-lg">TOTAL: </span>
                                                    <input type="text" class="form-control" aria-label="Sizing example input" id="monto_total" name="monto_total" aria-describedby="inputGroup-sizing-lg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 colmd-6">
                                        <div class="card ">
                                            <div class="card-body">
                                                <h5 class="card-title pb-0 text-center">Forma de pago</h5>
                                                <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_pago" id="qr" value="qr" required>
                                                    <label class="form-check-label fw-bold" for="qr">QR</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_pago" id="efectivo" value="efectivo" required>
                                                    <label class="form-check-label fw-bold" for="efectivo">Efectivo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipo_pago" id="tarjeta" value="tarjeta" required>
                                                    <label class="form-check-label fw-bold" for="tarjeta">Tarjeta</label>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-primary">Guardar Venta</button>
                                    </div>
                                </div>
                            </div>
                      
                        </div>
                    </form>
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

    function limpiarCamposVehiculo() {

        // Limpia los campos relacionados al vehículo
        $("#id_vehiculo").val(""); // Campo oculto
        $("#codigo_Bsisa").val(""); // Campo visible
        $("#placa").val(""); // Placa
        $("#marca").val(""); // Marca
        $("#color").val(""); // Color
        $("#tipo_vehiculo").val(""); // Tipo de vehículo

        // Limpia los campos relacionados al cliente
        $("#nombreCliente").val(""); // Nombre del cliente
        $("#paterno").val(""); // Apellido paterno
        $("#materno").val(""); // Apellido materno
        $("#ci").val(""); // CI
    }


    function limpiarCampos() {

        limpiarCamposVehiculo()
        // Limpia los campos relacionados al combustible
        $("#id_bomba").val("").trigger('change'); // Selección de bomba
        $("#nombreCombustible").val(""); // Nombre del combustible
        $("#nivel_actual").val(""); // Nivel actual del combustible
        $("#precio").val(""); // Precio del combustible
        $("#id_tanque").val(""); // Campo oculto para tanque

        // Limpia los campos relacionados a la venta
        $("#cantidad").val(""); // Cantidad a vender
        $("#monto_total").val(""); // Total calculado
        $("input[name='tipo_pago']").prop('checked', false); // Desmarca los radios de tipo de pago
    }


    $(document).ready(function() {

    
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
                    limpiarCamposVehiculos(); // Llama a la función para limpiar los datos
                }
            }
        });

        // Manejo del evento keydown para detectar la tecla DEL
        $("#codigo_Bsisa").keydown(function(event) {
            if (event.key === "Delete") { // Verifica si la tecla presionada es "DEL"
                limpiarCamposVehiculos();
            }
        });

    });


    $(document).ready(function() {
        $("#id_bomba").on("change", function() {
            const valorSeleccionado = $(this).val(); // Obtén el valor seleccionado

            // Verifica que no esté vacío
            if (valorSeleccionado) {
                // Realiza la llamada AJAX
                $.ajax({
                    url: '{{ url('') }}/bomba/search/' + valorSeleccionado, // Ruta al controlador en tu servidor
                    method: 'GET', // Método HTTP
                    success: function(respuesta) {
                        console.log(respuesta); // Verifica la respuesta en la consola
                        // Asegúrate de que la respuesta sea válida
                        if (respuesta) {
                            // Asigna el valor al input con id="precio"
                            $("#nombreCombustible").val(respuesta.nombreCombustible);
                            $("#precio").val(respuesta.precio);
                            $("#nivel_actual").val(respuesta.nivel_actual);
                            $("#id_tanque").val(respuesta.id_tanque);
                        } else {
                            alert("No se encontró el registro o el nivel actual.");
                        }
                    },
                    error: function(xhr, status, error) {
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

    function calcularTotal() {
            // Obtener los valores de precio y cantidad
            const precio = parseFloat(document.getElementById('precio').value) || 0;
            const cantidad = parseFloat(document.getElementById('cantidad').value) || 0;
            // Calcular el total
            const total = precio * cantidad;

            // Mostrar el total en el campo correspondiente
            document.getElementById('monto_total').value = total.toFixed(2);
        }

    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            html: `
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
        });
    @endif



 document.querySelector('#ventaForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita el envío normal del formulario

        const form = this;
        const formData = new FormData(form);

        // Mostrar el mensaje de carga
        Swal.fire({
            title: 'Procesando...',
            text: 'Por favor, espera mientras registramos la venta.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading(); // Muestra el indicador de carga
            }
        });

        fetch(form.action, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Cerrar el mensaje de carga
                Swal.close();
                // Abrir el comprobante en una nueva ventana emergente
                window.open(data.comprobante_url, '_blank', 'width=800,height=600');
                // Mostrar mensaje de éxito opcional
                Swal.fire({
                    icon: 'success',
                    title: 'Venta registrada exitosamente',
                    text: 'El comprobante se ha generado.',
                });

                limpiarCampos();

            } else {
                // Cerrar el mensaje de carga y mostrar error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al registrar la venta.',
                });
            }
        })
        .catch(error => {
            // Cerrar el mensaje de carga y mostrar error
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al procesar la solicitud.',
            });
            console.error(error);
        });
    });
</script>