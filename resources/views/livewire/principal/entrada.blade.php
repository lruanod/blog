
<div class="container-fluid">
    <div class="row form-group ">
        <label for="buscar" class="text-white">titulo</label>
        <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control">
    </div>

    @foreach($entradas as $entrada)
        <div class="card mb-12 mt-2" >
            <div class="row g-0">
                        <div class="col-md-8">
                            <div id="carousel{{$entrada->id}}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @php($count=0)
                                    @foreach($imagenes as $imagen)
                                        @if($imagen->entrada_id==$entrada->id)
                                           @php($count++)
                                            @if($count ==1)
                                                <div class="carousel-item active">
                                                    <img src="{{asset("$imagen->url)}}" class="d-block" alt="{{$imagen->id}}" width="700vw" height="400vh" >
                                                </div>
                                            @else
                                                <div class="carousel-item">
                                                    <img src="{{asset("$imagen->url)}}" class="d-block" alt="{{$imagen->id}}" width="700vw" height="400vh">
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{$entrada->id}}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel{{$entrada->id}}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">{{$entrada->titulo}}</h5>
                        <p class="card-text">{{$entrada->descripcion}}</p>
                        <p class="card-text"><small class="text-muted">{{\carbon\carbon::parse($entrada->created_at)->format('d/m/Y')}}</small></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{$entradas->links()}}

</div>
