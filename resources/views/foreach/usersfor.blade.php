<div class="form-group">
    <label for="exampleInputEmail1">Seleccione el usuario:</label>
        <select class="form-control select2" style="width: 100%;" name="user_id">
        @if($model->user_id)
          @foreach($users->all() as $user)
              @if($user->id == $model->user_id)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endif
          @endforeach

          @foreach($users->all() as $user)
              @if($user->id !== $model->user_id)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endif
          @endforeach

          <option value="">
            -----------Seleccione el usuario-------
          </option>
        @else 
          <option value="">
            -----------Seleccione el usuario-------
          </option>
          @foreach($users->all() as $user)
              @if($user->id == $model->user_id)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @else                                 
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endif
          @endforeach
        @endif
        </select>
    <div class="has-error">
        @if($errors->has('user_id'))
        <font color="#FF0000">
                <span style="background-color: inherit;">
                    {{$errors->first('user_id')}}
                </span>
        </font>
        @endif
    </div>
</div>