<x-app-layout>

    <div class="pagetitle">
        <h1>Crear Vehiculo</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                <li class="breadcrumb-item">Vehiculos</li>
                <li class="breadcrumb-item active">Crear Vehiculo</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-0" method="POST" action="{{ route('vehiculo.store') }}">
                            @csrf

                            <div class="col-md-4">
                                <label for="codigo_Bsisa" class="form-label">Código B-SISA</label>
                                <input type="text" class="form-control" id="codigo_Bsisa" name="codigo_Bsisa"
                                    value="{{ old('codigo_Bsisa') }}">
                                @error('codigo_Bsisa')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="placa" class="form-label">Placa</label>
                                <input type="text" class="form-control" id="placa" name="placa"
                                    value="{{ old('placa') }}">
                                @error('placa')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="marca" name="marca"
                                    value="{{ old('marca') }}">
                                @error('marca')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" class="form-control" id="color" name="color"
                                    value="{{ old('color') }}">
                                @error('color')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="tipo_vehiculo" class="form-label">Tipo de Vehiculo</label>
                                <input type="text" class="form-control" id="tipo_vehiculo" name="tipo_vehiculo"
                                    value="{{ old('tipo_vehiculo') }}">
                                @error('tipo_vehiculo')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                          
                        
                            <div class="col-md-4">
                                <label for="id_cliente" class="form-label">Propietario del Vehiculo</label>
                                <select class="form-select" id="id_cliente" name="id_cliente" required>
                                    <option selected disabled value="">Seleccinar Propietario</option>
                                    @foreach ($clientes as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre.' '.$item->paterno.' '.$item->materno}}</option>
                                    @endforeach
                                </select>
                                @error('id_cliente')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('vehiculo.index') }}" class= "btn btn-secondary">Regresar</a>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
