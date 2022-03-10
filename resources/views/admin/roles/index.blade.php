@extends('adminlte::page')

@section('title', 'Dysmath')

@section('content_header')
    <h1>Lista de roles.</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary" role="alert">
    <strong>Exito!</strong> {{session('info')}}
</div>
@endif

    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.roles.create')}}">Crear curso</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Permisos </th>
                        <th colspan="2" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr>
                        <td scope="row">{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td scope="row">
                            @forelse ($role->permissions as $permission)
                                <span class="badge badge-info">{{ $permission->name }}</span>
                            @empty
                                <span class="badge badge-danger">Permisos no añadidos</span>
                            @endforelse
                        </td>
                        <td width="1rem">
                            <a class="btn btn-secondary"href="{{route('admin.roles.edit',$role)}}">Editar</a>
                        </td>
                        <td width="1rem">
                            <form action="{{route('admin.roles.destroy',$role)}}"method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>      
                    @empty
                    <tr>
                        <td colspan="4">
                            No hay ningun rol registrado
                        </td>
                    </tr>
                        
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
