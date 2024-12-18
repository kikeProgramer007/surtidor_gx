<x-app-layout>

    <div class="pagetitle">
        <h1>Editar Bomba</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('bomba.index')}}">Bombas</a></li>
                <li class="breadcrumb-item active">Editar Bomba</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3 mt-0" method="POST" action="{{route('bomba.update', $bomba->id )}}">
                            @csrf
                            <div class="col-md-4">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$bomba->descripcion}}">
                                @error('descripcion')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="modelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" value="{{$bomba->modelo}}">
                                @error('modelo')
                                    <div class="text-danger small">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                         
                 
                            <div class="col-md-4">
                                <label for="id_tanque" class="form-label">Asignar Tanque</label>
                                <select class="form-select"  id="id_tanque" name="id_tanque" required>
                                    <option selected disabled value="">Seleccionar</option>
                                    @foreach ($tanques as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $bomba->id_tanque){{'selected'}}@endif>{{ $item->descripcion.', Nivel Actual:'.$item->nivel_actual}}</option>
                                    @endforeach
                                </select>
                                @error('id_tanque')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('bomba.index') }}" class= "btn btn-secondary">Regresar</a>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
