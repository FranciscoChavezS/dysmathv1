<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/resta.css')}}">
    </head>
    <body>
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

    <script src="{{asset('js/instructor/courses/games/resta.js')}}"></script>
        
    </body>
    </html>


</x-app-layout>

