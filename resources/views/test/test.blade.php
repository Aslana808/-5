@extends('layout.app')
@section('content')
    @foreach($posts as $post)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->post_text}}</p>
            </div>
        </div>
    @endforeach
@endsection
