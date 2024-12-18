<x-app-layout>

    <div class="pagetitle">
        <h1>Crear Tanque</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                <li class="breadcrumb-item">Tanques</li>
                <li class="breadcrumb-item active">Crear Tanque</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-0" method="POST" action="{{ route('tanque.store') }}">
                            @csrf

                            <div class="col-md-4">
                                <label for="descripcion" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"
                                    value="{{ old('descripcion') }}">
                                @error('descripcion')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="capacidad" class="form-label">Capacidad (Litros)</label>
                                <input type="text" class="form-control" id="capacidad" name="capacidad"
                                    value="{{ old('capacidad') }}">
                                @error('capacidad')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="nivel_actual" class="form-label">Nivel Actual (Litros)</label>
                                <input type="text" class="form-control" id="nivel_actual" name="nivel_actual"
                                    value="{{ old('nivel_actual') }}">
                                @error('nivel_actual')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion"
                                    value="{{ old('ubicacion') }}">
                                @error('ubicacion')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="id_combustible" class="form-label">Combustible Asignado</label>
                                <select class="form-select" id="id_combustible" name="id_combustible" required>
                                    <option selected disabled value="">Seleccionar</option>
                                    @foreach ($combustibles as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('id_combustible')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('tanque.index') }}" class= "btn btn-secondary">Regresar</a>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
