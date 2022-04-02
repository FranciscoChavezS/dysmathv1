<x-app-layout>
    <!DOCTYPE html><html lang="en"><head>
        <meta charset="UTF-8">
        <title>Juego de preguntas</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
      </head>
      
      <body>
       <link rel="stylesheet" href="{{asset('css/preguntas.css')}}">
      
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
      
      </body></html>
</x-app-layout>