@extends('adminlte::page')

@section('title', 'Dysmath')

@section('content_header')
    <h1>Cursos pendientes de aprobacion.</h1>
@stop

@section('content')
    @if (session('info'))
       <div class="alert alert-success">
           {{session('info')}}

       </div>
    @endif
    <div class="md:col-span-4 card mt-4">
        <div class="table-responsive">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td width="1000px">{{$course->category->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.courses.show',$course)}}">Revisar</a>
                            </td>
                            
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

