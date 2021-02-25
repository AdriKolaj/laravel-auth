@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Blog</h1>

    @foreach ($posts as $post)
    <div class="card-header">
      <h2>{{ $post->title }}</h2>
      <small>{{ $post->user->name }}</small>
    </div>
    <div class="card-body">
      {{ $post->body }}
    </div>
    @endforeach

  </div>

@endsection