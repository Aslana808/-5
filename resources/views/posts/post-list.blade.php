@extends('layout.app')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author Name</th>
            <th scope="col">Created date</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody >
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->author_name}}</td>
            <td>{{$post->created_at}}</td>
            <td>
                <a href="{{route('posts.edit', $post->id)}}">Edit</a>
            </td>
            <td>
                @method('DELETE')
                <a href="{{route('posts.destroy', $post->id)}}">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
        {{$posts->links()}}
    </table>
@endsection
