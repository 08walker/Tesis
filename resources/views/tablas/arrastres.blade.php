<table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        {{-- <th>ID</th> --}}
        <th>Identificador</th>
        <th>Descipción</th>
        <th>Tara</th>
        <th>Volumen máx de carga</th>
        <th>Peso máx de carga</th>
        <th>Equipo</th>
        <th>Tipo arrastre</th>
        <th>Tercero</th>
        <th>Organización</th>
        @can('update',new \App\Arrastre)
          <th>Acciones</th>
        @endcan
      </tr>
    </thead>
    <tbody>
      @foreach($model as $arrastre)
        <tr>
          {{-- <td>{{$arrastre->id}}</td> --}}
          <td>{{$arrastre->identificador}}</td>
          <td>{{$arrastre->description}}</td>
          <td>{{$arrastre->tara}}</td>
          <td>{{$arrastre->volumen_max_carga}}</td>
          <td>{{$arrastre->peso_max_carga}}</td>
          <td>{{$arrastre->equipo->identificador}}</td>
          <td>{{$arrastre->tipoArrastre->name}}</td>
          <td>{{optional($arrastre->tercero)->name}}</td>
          <td>{{optional($arrastre->organizacion)->name}}</td>
          
          @can('update',new \App\Arrastre)
              <td>
                @if(!$arrastre->activo)
                  <form id="quickForm" role="form" method="POST" action="{{ route('arrastres.activar',$arrastre) }}">
                      {{ method_field('PUT') }} {!! csrf_field() !!}
                      <input type="hidden" value="1" name="activo">
                    <button class="btn btn-sm btn-primary" type="submit">
                      Activar
                    </button>
                  </form>
                @else
                <a href="{{route('arrastres.edit',$arrastre)}}" class="btn btn-xs btn-info" title="Editar">
                  <i class="fa fa-pen"></i>
                </a>
                @can('delete',new \App\Arrastre)
                <form method="POST" action="{{route('arrastres.destroy', $arrastre)}}" style="display: inline;">
                  {{csrf_field()}}{{method_field('DELETE')}}
                  <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas eliminar el arrastre?')">
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