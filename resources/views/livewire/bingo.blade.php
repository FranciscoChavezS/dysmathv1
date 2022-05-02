<div>
    <div class="card ml-2 w-40 mt-4">
            <div class="card-body items-center">
                <button onclick="disableMute()" type="button" class="mr-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg></button>
                <button onclick="playSound()" type="button" class="mr-2 text-blue-800"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg></button>
                <button onclick="enableMute()" type="button" class="mr-2 text-"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" clip-rule="evenodd"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"></path></svg></button>
            </div>
        </div>
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
    {{-- <audio id="myAudio">        
        <source src="/audio/{{$audio}}.wav" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>   --}}  

    <audio id="myAudio" autostart="true" autoplay loop volume=0.20>
		<source src="horse.ogg" type="audio/ogg">
		<source src="{{asset('img/audio/cantando.mp3')}}" type="audio/mpeg">
		Your browser does not support the audio element.
	</audio><br>
	  
	  
	  <script>
		  
	  var x = document.getElementById("myAudio");
	  var y = document.getElementById("myAudio").volume = 0.2;

	  function enableMute() { 
		x.muted = true;
	  } 
	  
	  function disableMute() { 
		x.muted = false;
	  }

	  function playSound() { 
		x.play();
	  }

	  function pauseSound() { 
		x.pause();
	  }

	  
	  </script>

    <script src="{{asset('js/instructor/courses/games/bingo.js')}}"></script>

</div>
