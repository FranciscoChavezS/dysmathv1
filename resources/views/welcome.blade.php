<x-app-layout>
    {{--Portada--}}
    <section class="bg-cover" style="background-image: url({{asset('img/home/Fondo1.png')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
            <h1 class="text-white font-fold text-4xl ">DYSMATH</h1>
            <p class="text-white text-lg mt-2 mb-4"  > Es una aplicación web interactiva destinada a niños de 6 a 9 años con discalculia, para poder complementar el aprendizaje del individuo en el ámbito del razonamiento matemático. </p>
            
       @livewire('search')
        
        </div>
        </div>
    </section>
    <section class="mt-4">
        <h1 class="text-gray-600 text-center text-3xl mb-6 dark:text-white"> CONTENIDO</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure> 
                    <img class="rounded-xl h-36 w-full object-cover " src="{{asset('img/home/Logo1.png')}}" alt="" />
                </figure>
                <header mt-2>
                    <h1 class="text-center text-xl text-gray-800 dark:text-white">OBJETIVO</h1>

                </header>
                <p class="text-sm text-gray-500 dark:text-white text-center">Apoyar en el aprendizaje del razonamiento matemático en niños con discalculia de 6 a 9 años</p>
            
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/Logo2.png')}}" alt="" />
                </figure>
                <header mt-2>
                    <h1 class="text-center text-xl text-gray-800 dark:text-white">ACTIVIDADES</h1>

                </header>
                <p class="text-sm text-gray-500 dark:text-white text-center">Durante el curso se mostrarán distintas actividades, videos y recursos.</p>
            
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/Logo3.png')}}" alt="" />
                </figure>
                <header mt-2>
                    <h1 class="text-center text-xl text-gray-800 dark:text-white">GRADOS</h1>

                </header>
                <p class="text-sm text-gray-500 dark:text-white text-center">Esta página esta destinada a niños de primero a tercero de primaria</p>
            
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/Logo4.png')}}" alt="" />
                </figure>
                <header mt-2>
                    <h1 class="text-center text-xl text-gray-800 dark:text-white">TEMAS</h1>

                </header>
                <p class="text-sm text-gray-500 dark:text-gray-300 text-center">Los temas estan basados en el programa de estudios de los alumnos</p>
            
            </article>
        </div>
    </section>

    <section class="mt-6 bg-gray-700 py-12 dark:bg-indigo-800">
       
        <h1 class="text-center text-white text-3xl dark:text-white">¿No sabes que curso llevar?</h1>
        <p class="text-center text-white dark:text-gray-300">Dirigete al catalogo de cursos disponible y filtralos por categoria o nivel</p>
        <div class="flex justify-center mt-4">
            <a href="{{ route('courses.index')}}"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                Catalogo de cursos
            </a>
        </div>
    </section>
    <section class="my-24 ">
        <h1 class="text-center text-gray-600 text-3xl dark:text-white">ULTIMOS CURSOS</h1>
            <p class="text-center text-gray-500 text-sm mb-6 dark:text-white">REALIZA TU PRUEBA</p>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-x-6 gap-y-8">
                @foreach($courses as $course)

                <x-course-card :course="$course"/>


                @endforeach
            </div>
        </section>

        {{-- Estilos de Chatbot --}}
        <script>
            var botmanWidget = {
                title: "DYSMATH",
                placeholderText: "Escribe aquí...",
                introMessage: "Hola, encantado de conocerte 😁",
                aboutText: 'DysMath',
                mainColor: "#ab49cc",
                bubbleBackground: "#9C9C9C",
                desktopWidth: '500px',
                mobileHeight: '100%',
                mobileWidth: '300px',
                bubbleAvatarUrl: 'img/home/chatbot.png'
                
                
            };
        </script>

        <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
        
        <hr>
        <footer class="bg-gray-300 text-center lg:text-left shadow dark:bg-gray-800">
            <div class="container p-6 text-gray-800">
              <div class="grid lg:grid-cols-2 gap-4">
                <div class="mb-6 md:mb-0">
                    <h5 class="font-medium mb-2 uppercase dark:text-gray-300">CONTACTO PSICÓLOGO</h5>
          
                  <p class="mb-4 dark:text-gray-700">
                      <ul>
                          <li class="dark:text-gray-400">Romero Cervantes Paola Guadalupe</li>
                          <li class="dark:text-gray-400">NO. CÉDULA PROFESIONAL: 709 641 9 / CED PROF. ESTATAL PEJ322857</li>
                          <li class="dark:text-gray-400"><i class="fa fa-envelope"></i> pgr_3@hotmail.com</li>
                          <li class="dark:text-gray-400"><i class="fa fa-home"></i> CALLE HOSPITAL 851, CP: 44200 Guadalajara, Jal. México</li>
                          <li class="dark:text-gray-400"><i class="fa fa-phone"></i>+52 33 38 25 91 41</li>
                      </ul>
                  </p>
                </div>

                <div class="mb-6 md:mb-0 container">
                    <h5 class="font-medium mb-2 uppercase"></h5>
            
                    <p class="mb-4">
                      <img src="{{asset('img/home/Logo1.svg')}}" alt="" class="h-24">
                    </p>
                  </div>
              </div>
            </div>
          
            <div class="text-center text-gray-700 p-4" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2022 Copyright: Todos los derechos reservados 
              <a class="text-gray-800" href="#!">DysMath</a>
            </div>
          </footer>
          

</x-app-layout>

