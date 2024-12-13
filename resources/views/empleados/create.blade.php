<x-app-layout>

    <div class="pagetitle">
        <h1>Crear Empleado</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Clientes</li>
                <li class="breadcrumb-item active">Crear Empleado</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-0" method="POST" action="{{ route('empleado.store') }}">
                            @csrf
                            <div class="col-md-9">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="ci" class="form-label">CI</label>
                                <input type="number" class="form-control" id="ci" name="ci"
                                    value="{{ old('nombre') }}">
                                @error('nombre')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="paterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="paterno" name="paterno"
                                    value="{{ old('paterno') }}">
                                @error('paterno')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="materno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="materno" name="materno"
                                    value="{{ old('materno') }}">
                                @error('materno')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono"
                                    value="{{ old('telefono') }}">
                                @error('telefono')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="direccion" class="form-label">Direccion</label>
                                <input type="email" class="form-control" id="direccion" name="direccion"
                                    value="{{ old('direccion') }}">
                                @error('direccion')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="id_usuario" class="form-label">Usuario</label>
                                <select class="form-select" id="id_usuario" name="id_usuario" required>
                                    <option selected disabled value="">Asignar un usuario</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name}}</option>
                                    @endforeach
                                </select>
                                @error('id_usuario')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('empleado.index') }}" class= "btn btn-secondary">Regresar</a>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
