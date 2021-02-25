@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Tutti i post</h1>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titolo</th>
          <th>Autore</th>
          <th>Data creazione</th>
          <th colspan="3"></th>
        </tr>
      </thead>

      <tbody>
        @foreach ($posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->author }}</td>
              <td>{{ $post->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection