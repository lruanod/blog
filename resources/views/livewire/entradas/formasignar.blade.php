

<div class="row form-group">
    <label for="url" class="col-5 text-white">Imagen</label>
    <input type="file" class="form-control col-md-5" wire:model.defer="url" id="{{$identificador}}" multiple>
    @error('url') <span class="text-warning">{{$message}}</span> @enderror
</div>



<div class="card-body align-content-center">
    <div wire:loading wire:target="url" class="alert alert-danger">
        <ul>
            <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>
    @if ($url)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        @foreach($url as $key => $image)
            <img class="rounded" src="{{$image->temporaryUrl()}}" width="250vw" height="150vh" >
        @endforeach
    @endif
</div> <br>






