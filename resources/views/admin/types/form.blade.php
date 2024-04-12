@extends('layouts.app')

@section('content')
  <section>
    <div class="container">
      <a class="btn btn-primary my-4" href="{{ route('admin.types.index') }}">Torna alla lista</a>

      <h1>Form Categoria</h1>
      <form action="{{ route('admin.types.store') }}" class="row" method="POST">
        @csrf

        <div class="col-1">
          <label for="color">Colore</label>
          <input class="form-control" type="color" name="color" id="color" value="{{ old('title', $type->color) }}">
        </div>
        
        <div class="col-11">
          <label for="label">Etichetta</label>
          <input class="form-control" type="text" name="label" id="label" value="{{ old('title', $type->label) }}">
        </div>

        <div class="col-12">
          <button class="btn btn-success"> <i class="fa-solid fa-floppy-disk me-1"></i>{{ empty($type->id) ? 'Salva' : 'Modifica' }}</button>
      </div>
      </form>
    </div>
  </section>
@endsection


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection