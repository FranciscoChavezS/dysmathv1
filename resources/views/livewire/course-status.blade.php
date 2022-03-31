<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {{--mostrar video--}}
            {!!$current->iframe!!}
            </div>
            <h1 class="text-gray-600 dark:text-gray-300 tex text-3xl">{{$current->name}}</h1>
            @if ($current->description)
            <div class="text-gray-600">
                {{$current->description->name}}
            </div>
            @endif   
            <div class="flex justify-between mt-4">
                {{--marcar como terminada--}}
                <div class="flex items-center  cursor-pointer" wire:click="completed">
                    @if ($current->completed)
                    <i class="fa fa-toggle-on text-2xl text-blue-600 dark:text-blue-500"></i>
                    @else
                        <i class="fa fa-toggle-off text-2xl text-gray-600 dark:text-white"></i>
                    @endif
                    <p class="text-lg ml-2 dark:text-pink-300">Marcar como finalizada</p>
                </div>
                @if ($current->resource)
                    <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fa fa-download text-lg  "></i>
                        <p class="text-sm ml-2">Descargar recursos</p>
                    </div>

                @endif
            </div>

            {{-- Boton Siguiente y Anterior Personalizado --}}
            <div class="flex justify-between items-center mt-5">
                <div>
                    @if ($this->previous)
                        <button wire:click="changeLesson({{ $this->previous }})" class="block dark:text-white bg-white shadow h-12 px-4 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 mr-2 lg:mr-4 mb-2 dark:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline text-xs text-gray-400 mr-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            Anterior
                        </button>
                    @endif
                </div>
                <div class="container">
                    <div class="py-5">
                        <a href="{{$current->juego}}"><button type="button" class="lg:w-96 md:w-72 sm:w-44 border-b-4 border-gray-700 text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4  focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-md px-5 py-2.5 text-center">Jugar</button></a>
                    </div>
                </div>
                <div>
                    @if ($this->next)
                        <button wire:click="changeLesson({{ $this->next }})" class="block dark:text-white bg-white shadow h-12 px-4 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 mr-2 lg:mr-4 mb-2 dark:bg-gray-700">
                            Siguiente
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" inline text-xs text-gray-400 ml-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
         
        </div>

        <div>
            {{-- Muestra el perfil del profesor --}}
            <div class="card mb-4">
                <div class="card-body bg-blue-200">
                    <h1 class="text-lg text-gray-700 font-bold">PROFESOR</h1>
                        <div class="flex items-center py-5">
                            <figure class="flex-shrink-0 mr-4">
                                <img class="h-12 w-12 object-cover rounded-full shadow" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                            </figure>
                            <div>
                                <h1 class="font-bold text-gray-800">Prof. {{ $course->teacher->name }}</h1>
                                <a class="text-blue-500 text-sm" href="">{{'@'.Str::slug($course->teacher->name,'')}}</a>
                            </div>
                        </div>

                    </div>
                </div>
            
                {{-- Muestra el perfil del alumno y su progreso --}}
            <div class="card mb-8">
                <div class="card-body">
                    <a href="{{route('courses.show', $course)}}" class="no-underline hover:underline text-indigo-500"><h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1></a>
                    <div class="flex items-center">
                        <figure>
                            <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{ Auth::user()->profile_photo_url}}" alt="">
                        </figure>
                        <div>
                            <p>{{Auth::user()->name}}</p>
                            <a class="text-blue-500 text-sm" href="">{{'@'.Str::slug(Auth::user()->name,'')}}</a>
                        </div>

                    </div>
                    <p class="text-gray-600 text-sm mt-2">{{$this->advance. '%'}} completado</p>
                    <div class="relative pt-1">
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div style="width:{{$this->advance. '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
                        </div>
                    </div>
                    <ul>
                        @foreach ($course->sections as $section)
                            <li class="text-gray-600 mb-1">
                                <a class="font-bold text-base inline-block mb-2" href="">{{$section->name}}</a>
                                <ul>
                                    @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                        @if ($lesson->completed)
                                                @if ($current->id==$lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-400 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-400 rounded-full mr-2 mt-1"></span>
                                                @endif
                                        
                                        @else
                                            @if ($current->id==$lesson->id)
                                                <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                            @else
                                                <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                            @endif
                                        
                                        @endif
                                        </div>
                                        <a wire:click="changeLesson({{$lesson}})" class="cursor-pointer">{{$lesson->name}}
                                        </a>
                                    </li>
                                        
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
