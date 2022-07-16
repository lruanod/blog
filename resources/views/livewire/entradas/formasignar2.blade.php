
<div class="row form-group">
    <label for="url2" class="col-5 text-white">Imagen</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="url2" id="{{$identificador2}}">
    @error('url2') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="card-body align-content-center">
    <div wire:loading wire:target="url2" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>

    @if ($url2)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$url2->temporaryUrl()}}" width="250vw" height="150vh" >
        <br>
    @endif
    @if ($url3)
        <label  class="text-white align-content-center" >Imagen actual</label><br>
        <img class="rounded" src="{{asset("storage/$url3")}}" width="250vw" height="150vh" >
    @endif
</div> <br>
