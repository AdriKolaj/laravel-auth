@extends('layouts.app')

@section('content')

  @if(!empty($session["message"]))
    <div class="alert alert-success">
      {{ $session["message"]}}
    </div>
  @endif

  <div class="container">
    <h1 class="mb-5">Blog</h1>

    @foreach ($posts as $post)
      <section class="my-4">
        <div class="card-header text-center">
          <img src="{{ asset('storage/' . $post->img_path) }}" class="img-fluid" alt="{{ $post->title }}">
          <h2>{{ $post->title }}</h2>
          <small>{{ $post->user->name }}</small>
        </div>
        <div class="card-body">
          {{ $post->body }}
        </div>
      </section>
      <hr>
    @endforeach
  </div>

@endsection