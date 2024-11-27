<x-app-layout>

    <div class="pagetitle">
        <h1>Editar Turno</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('turno.index')}}">Turnos</a></li>
                <li class="breadcrumb-item active">Editar Turno</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-0" method="POST" action="{{route('turno.update', $turno->id )}}">
                            @csrf

                        

                            <div class="col-md-6">
                                <label for="descripcion" class="form-label">Descripción Turno</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"
                                   value="{{$turno->descripcion}}">
                                @error('descripcion')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="id_empleado" class="form-label">Empleado</label>
                                <select class="form-select"  id="id_empleado" name="id_empleado" required>
                                    <option selected disabled value="">Seleccionar Empleado</option>
                                    @foreach ($empleados as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $turno->id_empleado){{'selected'}}@endif>{{$item->nombre.' '.$item->paterno.' '.$item->materno}}</option>
                                    @endforeach
                                </select>
                                @error('id_empleado')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label for="inicio_turno" class="form-label">Inicio Turno</label>
                                <input type="datetime-local" class="form-control" id="inicio_turno" name="inicio_turno"value="{{$turno->inicio_turno}}" required>
                                @error('inicio_turno')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="fin_turno" class="form-label">Fin Turno</label>
                                <input type="datetime-local" class="form-control" id="fin_turno" name="fin_turno"value="{{$turno->fin_turno}}"required>
                                @error('fin_turno')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          


                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('turno.index') }}" class= "btn btn-secondary">Regresar</a>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
