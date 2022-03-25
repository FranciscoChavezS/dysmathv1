<div class="container mt-6">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-table-responsive>
       
        <div class="py-10 px-6 flex dark:bg-gray-700">

            <input wire:Keydown='limpiar_page' wire:model="search" class="form-input flex-1 shadow-sm rounded-lg focus:outline-none px-5 pr-16 dark:bg-gray-500 dark:placeholder-gray-300" placeholder="Buscar curso...">
            <a class="btn btn-danger ml-2 rounded-md" href="{{route('instructor.courses.create')}}">Crear nuevo curso</a>
        </div>
        @if ($courses->count())
            
        
            <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-600">
                <thead class="bg-gray-50 dark:bg-gray-600">
                    <tr>
                        <th scope="col" class="px-6 dark:text-white py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Matriculados
                        </th>
                        <th scope="col" class="px-6 py-3 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Calificacion
                        </th>
                        <th scope="col" class="px-6 py-3 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-500">
                @foreach ($courses as $course)
                    
                
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                @isset($course->image)
                                <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">

                                @else
                                <img class="h-10 w-10 rounded-full object-cover object-center" src="{{ asset('img/home/default.jpg') }}" alt="">
                                    
                                @endisset
                                </div>
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <a class="text-indigo-600 hover:text-indigo-900 dark:text-blue-300 dark:hover:text-indigo-600" href="{{ route('instructor.courses.edit', $course) }}">{{$course->title}}</a>
                                </div>
                                <div class="text-sm text-gray-500 dark:text-white">
                                    {{$course->category->name}}
                                </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 dark:text-white">{{$course->students->count()}}</div>
                            <div class="text-sm text-gray-500 dark:text-white">Alumnos matriculados</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 flex items-center dark:text-white">
                                {{$course->rating}}
                                <ul class="flex text-sm ml-2">
                                    <li class="mr-1">
                                        <i class="fa fa-star text-{{$course->rating>=1 ? 'yellow': 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star text-{{$course->rating>=2 ? 'yellow': 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star text-{{$course->rating>=3 ? 'yellow': 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star text-{{$course->rating>=4 ? 'yellow': 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1">
                                        <i class="fa fa-star text-{{$course->rating==5 ? 'yellow': 'gray'}}-400"></i>
                                    </li>
                
                                </ul>
                            </div>
                            <div class="text-sm text-gray-500 dark:text-white">Valoracion del curso</div>
                        </td>
                    
                        <td class="px-6 py-4 whitespace-nowrap">
                        @switch($course->status)
                            @case(1)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-900">
                                    Borrador
                                </span>
                                
                                @break
                            @case(2)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-200 dark:text-yellow-900">
                                    Revision
                                </span>    
                                @break
                            @case(3)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900">
                                    Publicado
                                </span>   
                                @break
                            @default
                                
                        @endswitch
                            
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{route('instructor.courses.edit',$course)}}" class="text-indigo-600 hover:text-indigo-900 dark:text-gray-800 dark:hover:text-indigo-900">Edit</a>
                        </td>
                </tr>
                @endforeach
                <!-- More people... -->
                </tbody>
            </table>

            <div class="px-6 py-4 dark:bg-gray-600">
                {{$courses->links()}}
            </div>
            
                
        @else
            <div class="px-6 py-4 dark:text-white">
                No hay ningun registro coincidente
            </div>
                
            
        @endif
    </x-table-responsive>
   
</div>
