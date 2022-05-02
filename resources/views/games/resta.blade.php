<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/resta.css')}}">
    </head>
    <body>
        <div class="card ml-2 w-40 mt-4">
            <div class="card-body items-center">
                <button onclick="disableMute()" type="button" class="mr-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg></button>
                <button onclick="playSound()" type="button" class="mr-2 text-blue-800"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg></button>
                <button onclick="enableMute()" type="button" class="mr-2 text-"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" clip-rule="evenodd"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"></path></svg></button>
            </div>
        </div>
        <div class="container">
            <h1 class="text-blue-900 text-4xl text-center font-extrabold dark:text-gray-300 mt-4 mb-4"><i class="fa fa-star text-yellow-300 dark:text-red-500"></i>JUEGO DE RESTAS </h1>
            <div class="container-res max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="izquierdo-res">
                    <div class="container-operacion">
                        <span id="resta">6 - 3 =</span>
                        <span class="resultado" id="resultado"> 3</span>
                    </div>
                    <span class="msj-res" id="msj">
                            
                    </span>
                </div>
                <div class="derecha-res">
                    <span id="op1" class="opcion-res" onclick="controlarRespuesta(this)">3</span>
                    <span id="op2" class="opcion-res" onclick="controlarRespuesta(this)">6</span>
                    <span id="op3" class="opcion-res" onclick="controlarRespuesta(this)">4</span>
                </div>
            </div>
        </div>

        <audio id="myAudio" autostart="true" autoplay loop volume=0.20>
            <source src="horse.ogg" type="audio/ogg">
            <source src="{{asset('img/audio/musica-de-elevador.mp3')}}" type="audio/mpeg">
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

    <script src="{{asset('js/instructor/courses/games/resta.js')}}"></script>
        
    </body>
    </html>


</x-app-layout>

