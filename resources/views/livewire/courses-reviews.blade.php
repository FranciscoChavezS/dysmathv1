<section class="mt-4" >

    <h1 class="font-bold text-3xl text-gray-800 dark:text-gray-300">Reseñas de estudiantes</h1>
    
    @can('enrolled', $course)
       <article class="mb-4">
        @can('valued', $course)
                <textarea wire:model="comment" class="form-input w-full rounded-lg dark:bg-gray-700 dark:placeholder-gray-300" rows="3" placeholder="Ingrese una reseña del curso"></textarea>
                 <div class="flex">
                    <button class="btn btn-primary mr-4" wire:click="store">Guardar</button>
                    <ul class="flex ">
                        <li class="mr-1 cursor-pointer"wire:click="$set('rating',1)">
                            <i class="fa fa-star text-{{$rating>=1 ? 'yellow': 'gray'}}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer"wire:click="$set('rating',2)">
                            <i class="fa fa-star text-{{$rating>=2 ? 'yellow': 'gray'}}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer"wire:click="$set('rating',3)">
                            <i class="fa fa-star text-{{$rating>=3 ? 'yellow': 'gray'}}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer"wire:click="$set('rating',4)">
                            <i class="fa fa-star text-{{$rating>=4 ? 'yellow': 'gray'}}-300"></i>
                        </li>
                        <li class="mr-1 cursor-pointer"wire:click="$set('rating',5)">
                            <i class="fa fa-star text-{{$rating==5 ? 'yellow': 'gray'}}-300"></i>
                        </li>
    
                    </ul>

                </div>
        @else
        <div class="flex items-center bg-indigo-500 text-white text-sm font-bold px-4 py-3 rounded-lg" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p>Este curso ya ha sido valorado.</p>
          </div>
        @endcan
       </article>
   @endcan
    
   <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 sm:gap-6 items-center mb-4">
       <div class="text-center text-yellow-400">
           <p class="text-6xl font-bold">{{$course->rating}}</p>
           <ul class="flex items-center space-x-1 text-xs justify-center">
                <li><i class="fa fa-star text-{{$course->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                <li><i class="fa fa-star text-{{$course->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                <li><i class="fa fa-star text-{{$course->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                <li><i class="fa fa-star text-{{$course->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                <li><i class="fa fa-star text-{{$course->rating==5 ? 'yellow': 'gray'}}-400"></i></li>
           </ul>
           <p class="text-lg font-semibold mb-2">{{$course->reviews->count()}} valoracion(es).</p>
       </div>
   </div>
   <hr>
    <div class="mb-8">
        <div class="">
            @foreach ($course->reviews as $review)
                {{-- <article class="flex mb-4 text-gray-800 ">
                    <figure class="mr-6">
                        <img class="h-12 w-12 object-cover rounded-full" src="{{$review->user->profile_photo_url}}" alt="">
                    </figure>

                    <div class="flex-1 bg-gray-50 rounded shadow-inner py-3 px-6 dark:bg-gray-600">
                        <div class="flex justify-between items-center mb-2">
                            <h1 class="text-md font-bold dark:text-gray-300">{{ $review->user->name }}</h1>
                            <span class="bg-white px-2 rounded-sm shadow-sm dark:bg-gray-500">
                                <svg class="inline h-4 w-4 text-yellow-400 mr-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                </svg><b class="dark:text-gray-300">{{ $review->rating }}</b>
                            </span>
                        </div>
                        
                        <p class="dark:text-gray-300">{{ $review->comment }}</p>
                    </div>
                </article> --}}

                <ul class="space-y-6 mt-8 mb-8">
                    <li wire:key="review-447">
                        <div class="flex">
                            <figure class="flex-shrink-0 mr-4">
                                <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full shadow" src="{{$review->user->profile_photo_url}}" alt="">
                            </figure>
                                <div class="w-[calc(100%-3.5rem)] sm:w-[calc(100%-4rem)]">
                                    <div class="flex">
                                        <div class="w-[calc(100%-2rem)]">
                                            <p class="font-semibold dark:text-gray-300">{{ $review->user->name }}</p>
                                        
                                        <div class="flex items-center">
                                            <ul class="flex items-center space-x-1 text-xs">
                                                <li><i class="fa fa-star text-{{$review->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                                                <li><i class="fa fa-star text-{{$review->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                                                <li><i class="fa fa-star text-{{$review->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                                                <li><i class="fa fa-star text-{{$review->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                                                <li><i class="fa fa-star text-{{$review->rating==5 ? 'yellow': 'gray'}}-400"></i></li>
                                            </ul>
                                            <p class="font-normal text-sm ml-1 dark:text-gray-300">{{$review->created_at->diffForHumans()}}</p>
                                        </div>
                                        <div class="my-1 text-sm relative">
                                            <p class="text-gray-700 text-sm dark:text-gray-300">{{ $review->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            @endforeach
        </div>
    </div>
</section>
