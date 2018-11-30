@extends('layouts.app')

@section('content')
<div class="panel">
  <div class="card">
    <div class="card-header">
      Editar auto {{ $car->id }}
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
          <div class="row">
            <div class="form-group col-md-6">
              <label for="brand">Marca:</label>
              <input type="text" class="form-control" name="brand" value={{ $car->brand }} />
            </div>
            <div class="form-group col-md-6">
              <label for="model">Modelo:</label>
              <input type="text" class="form-control" name="model" value={{ $car->model }} />
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="description">Descripción:</label>
              <input type="text" class="form-control" name="description" value={{ $car->description }} />
            </div>
            <div class="form-group col-md-6">
              <label for="price">Precio:</label>
              <input type="text" class="form-control" name="price" value={{ $car->price }} />
            </div>
          </div>
          <div class="d-flex align-items-end flex-column">            
            <button type="submit" class="btn btn-primary p-2">Guardar</button>
          </div>
        </form>
    </div>
  </div>
</div>
@endsection