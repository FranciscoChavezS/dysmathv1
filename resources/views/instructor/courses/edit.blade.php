<x-instructor-layout :course="$course">
  


    <h1 class="text-2xl font-bold mb-8 dark:text-gray-300">INFORMACION DEL CURSO</h1>

 
    <hr class="mb-6 mt-2">
        
                        {!! Form::model($course, ['route' => ['instructor.courses.update', $course],'method'=>'put','files'=>'true']) !!}
        
                           @include('instructor.courses.partials.form')
                            <div class="flex justify-end">
                                {!! Form::submit('Actualizar información', ['class' =>'btn btn-primary dark:bg-gray-700']) !!}
        
                            </div>
        
                        {!! Form::close() !!}
        
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
       <script src="{{asset('js/instructor/courses/form.js')}}"> </script>
    </x-slot>
    
</x-instructor-layout>