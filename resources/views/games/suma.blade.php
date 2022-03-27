<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/suma.css')}}">
    </head>
    <body>
        <h1 class="text-blue-900 text-4xl text-center font-extrabold dark:text-gray-300 mt-4 mb-4"><i class="fa fa-star text-yellow-300 dark:text-red-500"></i>JUEGO DE SUMA </h1>
        <div class="container1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="izquierdo1">
                <div class="container-operacion">
                     <span id="suma">9 + 9 =</span>
                     <span class="resultado" id="resultado"> 18</span>
                 </div>
                 <span class="msj1" id="msj">
                         
                 </span>
            </div>
            <div class="derecha1">
                <span id="op1" class="opcion1" onclick="controlarRespuesta(this)">18</span>
                <span id="op2" class="opcion1" onclick="controlarRespuesta(this)">17</span>
                <span id="op3" class="opcion1" onclick="controlarRespuesta(this)">8</span>
            </div>
        </div>

    <script src="{{asset('js/instructor/courses/games/suma.js')}}"></script>
        
    </body>
    </html>


</x-app-layout>

<style></style>
