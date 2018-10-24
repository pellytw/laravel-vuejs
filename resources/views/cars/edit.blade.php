@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar auto
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cars.update', $car->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="brand">Marca:</label>
          <input type="text" class="form-control" name="brand" value={{ $car->brand }} />
        </div>
        <div class="form-group">
          <label for="model">Modelo:</label>
          <input type="text" class="form-control" name="model" value={{ $car->model }} />
        </div>
        <div class="form-group">
          <label for="description">Descripción:</label>
          <input type="text" class="form-control" name="description" value={{ $car->description }} />
        </div>
        <div class="form-group">
          <label for="price">Precio:</label>
          <input type="text" class="form-control" name="price" value={{ $car->price }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection