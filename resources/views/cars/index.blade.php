@extends('layouts.app')

@section('content')
<div class="container">
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

  <table class="table table-striped">
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
            <td><a href="{{ route('cars.edit',$car->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>


  {{ $cars->links() }}

<div>
@endsection

