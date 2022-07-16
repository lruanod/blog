

<div class="row form-group">
    <label for="titulo" class="col-5 text-white">Titulo</label>
    <input type="text"  class="form-control col-md-5" wire:model.defer="titulo">
    @error('titulo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control" wire:model.defer="descripcion"  rows="6"></textarea>
    @error('descripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<br>







