<div>
 <div class="card">
     <div class="card-header">
        <input wire:Keydown='limpiar_page' wire:model="search"class='form-control w-100' placeholder='Escriba un nombre...'>
     </div>
     @if ($users->count())
         
    
        <div class="card-body">
            <table class="table table-striped table-responsive">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id}}</td>
                            <td width="250px">{{ $user->name}}</td>
                            <td width="250px" class="text-center">{{ $user->email}}</td>
                            <td width="1000px" class="text-center">
                                @foreach($user->roles as $role)
                                  {{ $role->name }}
                                @endforeach
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary"  href="{{route('admin.users.edit',$user)}}">Editar</a>
                            </td>
                        </tr>
                        
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
     @else
     <div class="card-body">
         <strong>No hay registros..</strong>
     </div>

    @endif
 </div>
</div>
