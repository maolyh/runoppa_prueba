@if(isset($popularOrganizationList))
  <table class="table table-hover">
    <thead>
  	 <th>Nombre</th>
  	 <th>Descripción</th>
  	 <th>URL</th>
  	 <th>Logo</th>
  	 <th></th>
    </thead>
    <tbody>
      @foreach($popularOrganizationList as $list)
        <tr>
          <td>{{$list->name}}</td>
          <td>{{$list->description}}</td>
          <td>{{$list->url}}</td>
          <td>
            <img src="{{url('/')}}/imgLogo/{{$list->logo}}" class="img-responsive" alt="Responsive image">  
          </td>
          <td>
            <a href="{{url('/')}}/{{$route}}/{{$list->id}}/edit"><img src="{{url('/')}}/img/edit.png" class="img-responsive" alt="Responsive image"></a>

            <form action="{{route($route.'.destroy',$list->id)}}" method="POST">
              {{ csrf_field() }}
              <!--<input type="hidden" name="_method" value="DELETE">-->
              {{ method_field('DELETE') }}
              <input type="submit" class="submit-icon">
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endif