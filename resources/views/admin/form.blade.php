@if (session()->has('aprovalMessage'))
  <div class="alert alert-success" role="alert">
    {{session('aprovalMessage')}}
  </div>
@elseif (session()->has('errorMessage'))
  <div class="alert alert-danger" role="alert">
    {{session('errorMessage')}}
  </div>
@endif


<form method="POST" action="{{url($route)}}" enctype="multipart/form-data">
  {{csrf_field()}}
  
  <div class="row">
    <div class="col-md-2"> 
      <label for="name">Nombre</label>
    </div>
    <div class="col-md-10">
      <input type="text" name="name" placeholder="Nombre">
        @if ($errors->has('name'))
          <span style="color:red;">{{$errors->first('name')}}</span>
        @endif
    </div>
  </div> 
  <div class="row">
    <div class="col-md-2"> 
      <label for="name">Descripción</label>
    </div>
    <div class="col-md-10"><input type="text" name="description" placeholder="Descripción">
      @if ($errors->has('description'))
       <span style="color:red;">{{$errors->first('description')}}</span>
      @endif
    </div>
  </div> 
  
<!--Caso de tablas administrativas que contengan url y logo-->
  @if (!$isBasicView) 

    <div class="row">
      <div class="col-md-2"> 
        <label for="name">URL</label>
      </div>
      <div class="col-md-10"><input type="text" name="url" placeholder="URL">
        @if ($errors->has('url'))
          <span style="color:red;">{{$errors->first('url')}}</span>
        @endif
      </div>
    </div> 
    <div class="row">
      <div class="col-md-2"> 
        <label for="name">Logo</label>
      </div>
      <div class="col-md-10"><input type="file" class="form-control" name="logo">
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
              <option value="{{$list -> id}}"> {{$list -> name}}</option>
            @endforeach
          </select>
        @endif
      </div>
    </div>
     
  @endif
  
  <div class="form-group">
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
  </div>
</form>
