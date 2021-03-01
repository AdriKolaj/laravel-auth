@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Crea un nuovo Post</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')

      <div class="form-group">
        <label for="title">Titolo</label>
        <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}">
      </div>

      <div class="form-group">
        <label for="author">Autore</label>
        <input class="form-control" type="text" id="author" name="author" value="{{ old('author') }}">
      </div>

      <div class="form-group">
        <label for="body">Testo</label>
        <textarea class="form-control" name="body" id="body" rows="10">{{ old('body') }}</textarea>
      </div>

      <div class="form-group">
        <label for="img_path">Scegli immagine</label>
        <input class="form-control" type="file" name="img_path" id="img_path" accept="image/*">
      </div>

      <input class="btn btn-primary" type="submit" value="Salva"> 
    </form>
  </div>

@endsection