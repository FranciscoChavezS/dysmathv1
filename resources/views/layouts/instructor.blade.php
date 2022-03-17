<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head class="">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DYSMATH') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased ">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            @if (session('info'))
            <div class="card text-sm mt-2">
                <div class="card-body flex-1 col-span-4 bg-green-300">
                   <p class="text-font-bold text-gray-600 text-center text-lg">{{session('info')}}</p>
                </div>
            </div> 
            @endif

            <!-- Page Content -->
            <div class="container py-12 grid md:grid-cols-5 md:gap-8 ">
                <aside>
                    <h1 class="folt-bold text-lg mb-4">Edicion del curso</h1>
        {{--routeIs para metodo link activo--}}
        <ul class="mb-8">
            <li>
                <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.edit', $course) }}">Informacion del curso</a>
            </li>
            <li>
                <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.curriculum', $course) }}">Crear lecciones</a>
            </li>
            <li>
                <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.goals', $course) }}">Crear metas</a>
            </li>
            <li>
                <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.students', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.students', $course) }}">Estudiantes</a>
            </li>

            @if ($course->observation)
                <li>
                    <a class="block px-4 py-2 mb-1 border-l-4 @routeIs('instructor.courses.observation', $course) text-blue-700 bg-blue-100 hover:bg-blue-200 border-blue-400 @else text-gray-600 hover:bg-gray-200 border-transparent @endif" href="{{ route('instructor.courses.observation', $course) }}">Observaciones</a>
                </li>
            @endif
        </ul>

                    @switch($course->status)
                        @case(1)
                        <form action="{{route('instructor.courses.status', $course)}}" method="post">
                            @csrf
    
                            <button class="btn btn-danger w-full col-span-4"type="submit">solicitar revision</button>
                        </form>
                            @break
                        @case(2)
                        <div class="card text-sm">
                            <div class="card-body flex-1 col-span-4 bg-yellow-200">
                                Este curso se encuentra en revision
                            </div>
                        </div>
                            
                            @break
                        @case(3)
                        <div class="card text-sm">
                            <div class="card-body flex-1 col-span-4 bg-green-200">
                                Este curso se encuentra publicado
                            </div>
                        </div>
                            @break
                        @default
                            
                    @endswitch

                   

                </aside>
                <div class="md:col-span-4 card mt-4">
                    <main class="card-body text-gray-600">
                        {{$slot}}
                    </main>
        
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            
       
            {{$js}}

        @endisset

    </body>
</html>
