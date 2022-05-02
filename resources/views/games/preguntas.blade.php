<x-app-layout>
    <!DOCTYPE html><html lang="en"><head>
        <meta charset="UTF-8">
        <title>Juego de preguntas</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
      </head>
      
      <body>
       <link rel="stylesheet" href="{{asset('css/preguntas.css')}}">
       <div class="card ml-2 w-40 mt-4">
        <div class="card-body items-center">
            <button onclick="disableMute()" type="button" class="mr-2"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg></button>
            <button onclick="playSound()" type="button" class="mr-2 text-blue-800"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg></button>
            <button onclick="enableMute()" type="button" class="mr-2 text-"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" clip-rule="evenodd"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"></path></svg></button>
        </div>
      </div>
        <div class="contenedor bg-blue-500 ">
          <div class="puntaje text-gray-500" id="puntaje"></div>
          <div class="encabezado">
            <div class="categoria" id="categoria">
            </div>
            <div class="numero" id="numero"></div>
            <div class="pregunta" id="pregunta">
            </div>
            <img src="#" class="imagen" id="imagen">
          </div>
          <div class="btn shadow" id="btn1" onclick="oprimir_btn(0)"></div>
          <div class="btn shadow" id="btn2" onclick="oprimir_btn(1)"></div>
          <div class="btn shadow" id="btn3" onclick="oprimir_btn(2)"></div>
          <div class="btn shadow" id="btn4" onclick="oprimir_btn(3)"></div>
          
          <script src="{{asset('js/instructor/courses/games/preguntas.js')}}"></script>
        </div>

        <audio id="myAudio" autostart="true" autoplay loop volume=0.20>
          <source src="horse.ogg" type="audio/ogg">
          <source src="{{asset('img/audio/Escribe.mp3')}}" type="audio/mpeg">
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
      
      </body></html>
</x-app-layout>