<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Fecha de inicio</th>
      <th>Número de factura</th>
      <th>Origen</th>
      <th>Destino</th>
      <th>Días en curso</th>
      <th>Ver detalles</th>
    </tr>
  </thead>
  <tbody>
      @foreach($model as $transf)
        <tr>
          <td>{{$transf->id}}</td>
          <td>{{$transf->fyh_salida}}</td>
          <td>{{$transf->num_fact}}</td>
          <td>{{$transf->origen->name}}</td>
          <td>{{$transf->destino->name}}</td>
          <td>{{\Carbon\Carbon::now()->diffInDays($transf->fyh_salida)}}</td>
          {{-- <td>{{\Carbon\Carbon::now()->format('d/m/yy')}}</td> --}}
          <td>
            <a href="{{route('tenv.show',$transf)}}">
              <i class="fa fa-eye"></i>
            </a>
            <a href="{{route('tenv.edit',$transf)}}" class="btn btn-xs btn-info">
              <i class="fa fa-pen"></i>
            </a>
              <form method="POST" action="{{route('tenv.destroy', $transf)}}" style="display: inline;">
                {{csrf_field()}}{{method_field('DELETE')}}
                <button class="btn btn-xs btn-danger" onclick="return confirm('¿Estas seguro de que deseas elimiar la transferencia?')">
                <i class="fa fa-times"></i>
              </button>
              </form>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>