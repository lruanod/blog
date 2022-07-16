<div class="col-md-12 mt-5">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Entradas</h4>
    </div>
</div>

<div class="col-md-10 mt-3">
    <div class=" row justify-content-center">
        <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );">
            <div class="card-header text-center text-white">
                Busqueda
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3">

                        <div class="row form-group">
                            <label for="buscar" class="text-white">titulo</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-3">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ Entrada</label><br>
                        <button type="button" class="btn btn-success col-md-4" data-toggle="modal" data-target="#addentrada" title="Agragar entrada">
                            <i class="bi-arrow-return-right"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Lista entradas</h4>
    </div><br>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha
            </th>
            <th>
                Titulo
            </th>
            <th>
                Descripción
            </th>
            <th>
                Imagen
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($entradas as $entrada)
            <tr>
                <td>
                   creado {{\carbon\carbon::parse($entrada->created_at)->format('d/m/Y')}}<br>
                   editado {{\carbon\carbon::parse($entrada->updated_at)->format('d/m/Y')}}
                </td>
                <td>
                    {{$entrada->titulo}}
                </td>
                <td>
                    {{$entrada->descripcion}}
                </td>
                <td>
                    @foreach($imagenes as $imagen)
                        @if($imagen->entrada_id==$entrada->id)
                          <img class="rounded" src="{{asset("storage/$imagen->url")}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">
                            <button type="button" class="btn btn-danger " title="Eliminar fotografía" wire:click="destroy({{$imagen->id}})" >
                                <i class="bi-trash text-white"></i>
                            </button>
                            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editasignar" title="editar fotografía" wire:click="editasignar({{$imagen->id}})" >
                                <i class="bi-pencil-fill text-white"></i>
                            </button>
                            <br><br>
                        @endif
                    @endforeach
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editentrada" title="Editar entrada" wire:click="edit({{$entrada->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addasignar" title="Agregar fotografía" wire:click="addasignar({{$entrada->id}})" >
                        <i class="bi-image text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <br>
    {{$entradas->links()}}
</div>
