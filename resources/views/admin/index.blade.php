@extends('adminlte::page')

@section('title', 'Dysmath')

@section('content_header')
    <h1>TABLERO DYSMATH</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            {{-- CARD USUARIOS --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ \App\Models\User::all()->count() }}</h3>
                            <p>Total de Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>

                        </div>
                            <a href="{{route('admin.users.index')}}" class="small-box-footer">Mas información
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                    </div>
                </div>

            {{-- CARD ROLES --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ Spatie\Permission\Models\Role::all()->count() }}</h3>
                        <p>Total de Roles</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-user-shield"></i>

                    </div>
                        <a href="{{route('admin.roles.index')}}" class="small-box-footer">Mas información
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                </div>
            </div>

            {{-- CARD CURSOS --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ \App\Models\Course::all()->count() }}</h3>
                        <p>Total de Cursos</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book-reader"></i>

                    </div>
                        <a href="{{route('courses.index')}}" class="small-box-footer">Mas información
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                </div>
            </div>

            {{-- CARD CATEGORÍAS --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ \App\Models\Category::all()->count() }}</h3>
                        <p>Total de Categorías</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-cogs"></i>

                    </div>
                        <a href="{{route('admin.categories.index')}}" class="small-box-footer">Mas información
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                </div>
            </div>
        </div>        
    </div>
    
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

