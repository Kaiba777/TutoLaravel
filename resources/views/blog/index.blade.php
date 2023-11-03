@extends('base')

@section('title', 'Accueil du blog')

@section('content')
    <h1>Mon blog</h1>

    @foreach ($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p>
                @if ($post->category)
                    Catégorie: <strong>{{ $post->category?->name }}</strong>@if (!$post->tags->isEmpty()),@endif
                @endif
                @if (!$post->tags->isEmpty())
                    Tags :
                    @foreach ($post->tags as $tag)
                        <span>{{ $tag->name }}</span>
                    @endforeach
                @endif
            </p>

            <p>{{ $post->content }}</p>

            <p>
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">Lire la suite</a>
            </p>
        </article>
    @endforeach

    {{ $posts->links() }}
@endsection
    
    
