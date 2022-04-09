<div>
    <div class="row pb-5 mt-6 container">
        <div class="col-md-8">

            {{-- Los resultados que van saliendo --}}
            <div class="row">
                @foreach($resultados as $clave => $valor)
                    @if($valor == 0)
                        <div class="col-1-10 resultado" style="min-width: 10%; min-height: 60px; text-align: center;">                                                    
                            <span 
                                id=""
                                class="badge badge-secondary rounded-circle py-2 px-2" 
                                style="font-size: 24px;">
                                    {{ str_pad($clave, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>
                    @else
                        @if($clave == $ultimoNumero)
                            <div class="col-1-10 resulado align-middle" style="min-width: 10%; min-height: 60px; text-align: center;">
                                <span 
                                    class="badge badge-success animated heartBeat rounded-circle py-2 px-2" 
                                    style="font-size: 24px; margin-top: 0px;">
                                        <strong>{{ str_pad($clave, 2, '0', STR_PAD_LEFT) }}</strong>
                                </span>
                            </div>
                        @else
                            <div class="col-1-10 resultado" style="min-width: 10%; min-height: 60px; text-align: center;">
                                <span 
                                    class="badge badge-danger rounded-circle py-2 px-2" 
                                    style="font-size: 24px;">
                                        {{ str_pad($clave, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>

        </div>

        <div class="col-md-4 pt-3">
            {{-- El juego --}}
            <div class="text-center">                
                <div wire:loading.remove class="text-danger">
                    <span class="badge badge-success rounded-circle py-4 px-4" style="font-size: 100px;">
                        <strong>{{ str_pad($ultimoNumero, 2, '0', STR_PAD_LEFT) }}</strong></span>
                </div>
                <div wire:loading>
                    <img src="/img/home/loading-naranja.gif" style="width: 120px;">
                </div>                
            </div>
            <div class="text-center mt-3">
                <button 
                    id="botonJugar"
                    wire:click="nuevaJugada" 
                    wire:loading.remove                                        
                    class="btn btn-primary">Jugar Una Vez</button>
            </div>
            {{-- <div class="text-center mt-3">
                <button 
                    id="botonAutomatico"
                    wire:loading.remove
                    class="btn btn-danger" 
                    onClick="iniciarAutomatico()">
                        Modo Automatico
                </button>                
            </div> --}}

        </div>

    </div>
    
    {{-- Sonidos --}}
    <audio id="myAudio">        
        <source src="/audio/{{$audio}}.wav" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>    

    <script src="{{asset('js/instructor/courses/games/bingo.js')}}"></script>

</div>
