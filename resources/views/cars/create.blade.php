@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
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
          <div class="row">
            <div class="form-group col-md-6">
                @csrf
                <label for="brand">Marca del auto:</label>
                <input type="text" class="form-control" name="brand"/>
            </div>
            <div class="form-group col-md-6">
                <label for="model">Modelo del auto:</label>
                <input type="text" class="form-control" name="model"/>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label for="price">Precio del auto:</label>
                <input type="text" class="form-control" name="price"/>
            </div>
            <div class="form-group col-md-6">
                <label for="description">Descripcion:</label>
                <input type="text" class="form-control" name="description"/>
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