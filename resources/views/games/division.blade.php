<x-app-layout>
    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Juego de suma</title>
	<link rel="stylesheet" href="{{asset('css/division.css')}}">
</head>
<body>
	<div class="container">
	
		<h1 class="text-blue-900 text-4xl text-center font-extrabold dark:text-gray-300 mt-4 mb-4"><i class="fa fa-star text-yellow-300 dark:text-red-500"></i>JUEGO DE DIVISIÓN</h1>
		<div class="container-div">
			<div class="izquierdo-div">
				<div class="container-operacion">
					<span id="division">9 / 9 =</span>
					<span class="resultado" id="resultado"> 1</span>
				</div>
				<span class="msj-div" id="msj">
						
				</span>
			</div>
			<div class="derecha-div">
				<span id="op1" class="opcion-div" onclick="controlarRespuesta(this)">1</span>
				<span id="op2" class="opcion-div" onclick="controlarRespuesta(this)">18</span>
				<span id="op3" class="opcion-div" onclick="controlarRespuesta(this)">0</span>
			</div>
		</div>
	</div>
	<script src="{{asset('js/instructor/courses/games/division.js')}}"></script>
</body>
</html>

</x-app-layout>

