<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      {{-- <th>ID</th> --}}
      <th>Nombre</th>
      <th>Unidad de Medida</th>
      <th>Identificador</th>
      <th>Descripción</th>
      
      @can('update',new \App\Producto)
      <th>Acciones</th>
      @endcan

    </tr>
    </thead>

    <tbody>
    @foreach($productos as $producto)
    <tr>
      {{-- <td>{{$producto->id}}</td> --}}
      <td>{{$producto->name}}</td>
      <td>{{$producto->unidadMedida->name}}</td>
      <td>{{$producto->identificador}}</td>
      <td>{{$producto->description}}</td>
      
      @can('update',new \App\Producto)
      <td>
        @if(!$producto->activo)
                      <form id="quickForm" role="form" method="POST" action="{{ route('productos.activar',$producto) }}">
                          {{ method_field('PUT') }} {!! csrf_field() !!}
                          <input type="hidden" value="1" name="activo">
                        <button class="btn btn-sm btn-primary" type="submit">
                          Activar
                        </button>
                      </form>
        @else
            <a href="{{route('productos.edit',$producto)}}" class="btn btn-xs btn-info">
              <i class="fa fa-pen"></i>
            </a>

            @can('delete',new \App\Producto)
            <form method="POST" action="{{route('productos.destroy', $producto)}}" style="display: inline;">
              {{csrf_field()}}{{method_field('DELETE')}}
              <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar el producto?')">
                <i class="fa fa-times"></i>
              </button>
            </form>
            @endcan
        @endif            
      </td>
      @endcan
    </tr>
    @endforeach
    </tbody>
</table>