<div>
 <div class="md:col-span-4 card mt-4">
     <div class="card-header">
        <input wire:Keydown='limpiar_page' wire:model="search"class='form-control w-100' placeholder='Escriba un nombre...'>
     </div>
     @if ($users->count())
         
    
     <div class="table-responsive">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
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
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
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
