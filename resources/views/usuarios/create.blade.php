<x-app-layout>

    <div class="pagetitle">
        <h1>Crear Usuario</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Usuarios</li>
                <li class="breadcrumb-item active">Crear Usuario</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-0" method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" autofocus autocomplete="name">
                                @error('name')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="ci" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" autocomplete="username">
                                @error('email')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" autocomplete="new-password" >
                                @error('password_confirmation')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('user.index') }}" class= "btn btn-secondary">Regresar</a>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
