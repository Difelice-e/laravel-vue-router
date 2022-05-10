@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="{{route('admin.posts.create')}}">Nuovo post</a>
</div>


<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Slug</th>
            <th scope="col">Utente</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Data pubblicazione</th>
            <th scope="col">Ultima modifica</th>
            <th scope="col">Data creazione</th>
          </tr>
        </thead>
        <tbody>
           @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : '-'}}</td>
            {{-- checkbox dei tag  --}}
            <td>
              @foreach ($post->tags as $tag)
              <span class="badge rounded-pill bg-info text-dark">{{$tag->name}}</span>
              @endforeach
            </td>

            {{-- data pubblicazione post  --}}
            <td>{{ $post->published_at ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->published_at)->locale('it-IT')->diffForHumans() : '-' }}</td>

            {{-- data modifica post  --}}
            <td>{{ $post->updated_at ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->updated_at)->locale('it-IT')->diffForHumans() : '-' }}</td>

            {{-- data creazione post nel database  --}}
            <td>{{ $post->getDate($post->created_at) }}</td>

            {{-- pulsanti modifica e eliminazione  --}}
            <td>
                <a class="btn btn-small btn-warning" href="{{route('admin.posts.edit', $post)}}">Edit</a>
                <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-small btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
</div>

@endsection