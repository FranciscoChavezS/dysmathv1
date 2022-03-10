@extends('adminlte::page')

@section('title', 'Dysmath')

@section('content_header')
<a class="btn btn-secondary btn-sm float-right" href="{{route('admin.categories.create')}}">Crear categoria</a>
    <h1>Lista de categorias</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
    @endif
   <div class="md:col-span-4 card mt-4">
       <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan= '2'></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{$category->id}}
                                </td>
                                <td width="1000px">
                                    {{$category->name}}
                                </td>
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit',$category)}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
   </div>
@stop

