@extends('adminlte::page')

@section('title', 'Dysmath')

@section('content_header')
<a class="btn btn-secondary btn-sm float-right" href="{{route('admin.prices.create')}}">Agregar Edad</a>
    <h1>Lista de edades</h1>
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
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prices as $price)
                        <tr>
                            <td>
                                {{$price->id}}
                            </td>
                            <td width="1000px">
                                {{$price->name}}
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary" href="{{route('admin.prices.edit',$price)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.prices.destroy',$price)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

