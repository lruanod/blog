<!-- modal buscarasigar-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editasignar" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editasignar">Editar imagenes</h5>
                <button wire:click="default" id="cerrarasignar" class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <i class="bi-backspace-reverse text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #1B92F0 );">
                        <div class="card-header text-center text-white">
                            Adjuntar imagenes
                        </div>
                        <div class="card-body">
                            @include('livewire.entradas.formasignar2')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="updateasignar" class="btn btn-danger col-md-5">Actualizar</button>
                            </div>
                            <br>
                            <div class="row form-group ">
                                <button wire:click="default" class="btn btn-danger col-md-5" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- modal buscaresasignar-->
