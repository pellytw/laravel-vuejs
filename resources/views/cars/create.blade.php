@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Crear auto
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
      <form method="POST" action="{{ route('cars.store') }}"  role="form">
          <div class="form-group">
              @csrf
              <label for="brand">Marca del auto:</label>
              <input type="text" class="form-control" name="brand"/>
          </div>
          <div class="form-group">
              <label for="model">Modelo del auto:</label>
              <input type="text" class="form-control" name="model"/>
          </div>
          <div class="form-group">
              <label for="price">Precio del auto:</label>
              <input type="text" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="description">Descripcion:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection