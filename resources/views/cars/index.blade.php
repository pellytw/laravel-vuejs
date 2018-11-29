@extends('layouts.app')

@section('content')
<div class="panel">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <form method="get" action="{{ route('cars.index') }}" class="form-inline d-flex align-items-end flex-column">
    <div class="form-group">
      <input type="text" name="query_filter" placeholder="Buscar" class="form-control">
      <input type="submit" value="Buscar" class="form-control">
    </div>    
  </form>

  <br>
  <div class="table-responsive">
    <table class="table-project">
      <thead>
          <tr>
            <td>Id</td>
            <td>Marca</td>
            <td>Modelo</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($cars as $car)
          <tr>
              <td>{{$car->id}}</td>
              <td>{{$car->brand}}</td>
              <td>{{$car->model}}</td>
              <td>{{$car->description}}</td>
              <td>{{$car->price}}</td>
              <td><a href="{{ route('cars.edit',$car->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a></td>
              <td>
                  <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt"></i></button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>

  <div class="form-group">    
    <a href="{{ route('viewpdf') }}" class="btn btn-primary btn-sm">Open PDF</a>
  </div>


  {{ $cars->links() }}

<div>
@endsection

