@props(['course'])

<article class="card flex flex-col dark:bg-gray-700">


    <img class= "h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" > 
      <div class="card-body flex-1 flex flex-col ">
          <h1 class="card-title">{{Str::limit($course->title,40)}}</h1>
          <p class=" text-gray-500 text-sm mb-2 mt-auto dark:text-gray-300">Prof: {{$course->teacher->name}}</p>
          <div class="flex">
              <ul class="flex text-sm">
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
                  <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{$course->rating}}</span>

              </ul>
              <p class="text-sm text-gray-500 ml-auto dark:text-gray-300">
                 <i class="fas fa-users"></i>
                  ({{$course->students_count}})
              </p>
          </div>

          @if ($course->price->value==0)
          <p class="my-2 text-green-700 font-bold dark:text-green-400">GRATIS</p>
          @else
          <p class="my-2 text-gray-500 font-bold">$ {{$course->price->value}}</p>
          @endif
          
          <a href="{{route('courses.show',$course)}}" class="btn-block mt-1 btn btn-primary">
              Mas informacion
          </a>
      </div>
  </article>
