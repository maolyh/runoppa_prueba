@if(isset($isEditable))
  @if ($isEditable)

    <form method="POST" action="{{route($route.'.update', $popularOrganizationSelected->id)}}" enctype="multipart/form-data">
      <!--<input type="hidden" name="_method" value="PUT">-->
      {{ method_field('PUT') }}
      <input class="hide" type="text" name="img" value="{{$popularOrganizationSelected->logo}}">
      {{csrf_field()}}
  
      <div class="row">
        <div class="col-md-2"> 
          <label for="name">Nombre</label>
        </div>
      <div class="col-md-10"><input type="text" name="name" value="{{$popularOrganizationSelected->name}}">
        @if ($errors->has('name'))
         <span style="color:red;">{{$errors->first('name')}}</span>
        @endif
       </div>
      </div> 
    
      <div class="row">
        <div class="col-md-2"> 
          <label for="name">Descripción</label>
        </div>
        <div class="col-md-10"><input type="text" name="description" value="{{$popularOrganizationSelected->description}}">
          @if ($errors->has('description'))
            <span style="color:red;">{{$errors->first('description')}}</span>
          @endif
        </div>
      </div>

      @if (!$isBasicView) 

        <div class="row">
          <div class="col-md-2"> 
           <label for="name">URL</label>
          </div>
          <div class="col-md-10"><input type="text" name="url" value="{{$popularOrganizationSelected->url}}">
            @if ($errors->has('url'))
              <span style="color:red;">{{$errors->first('url')}}</span>
            @endif
          </div>
        </div> 
        <div class="row">
          <div class="col-md-2"> 
            <label for="name">Logo</label>
          </div>
          <div class="col-md-10">
            <input value="{{$popularOrganizationSelected->logo}}" type="file" class="form-control" name="logo" > 
              @if ($errors->has('logo'))
                <span style="color:red;">{{$errors->first('logo')}}</span>
              @endif
          </div>
        </div> 
        <div class="row">
          <div class="col-md-2"> 
            <label for="name">Status</label>
          </div>
          <div class="col-md-10">
            <!-- Form::select('id', $lstatus, null, ['class' => 'form-control']) !!}-->
            @if (isset($statusList))
              <select class="form-control" name="status">
                @foreach($statusList as $list)
                  @if ($list -> id == $popularOrganizationSelected->id_status)
                    {{$checked = "selected"}}
                  @else
                    {{$checked = ""}}
                  @endif
                  <option value="{{$list -> id}}" {{$checked}}> {{$list -> name}}</option>
                @endforeach
              </select>
            @endif  
          </div>
        </div> 
      @endif    
  
      <div class="form-group">
        <div class="col-md-12">
          <button type="submit" class="btn btn-warning">Modificar</button>
        </div>
      </div>
    </form>
  @endif
@endif
