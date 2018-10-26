@extends('layouts.app')

@section('content')
<div class="container">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
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

