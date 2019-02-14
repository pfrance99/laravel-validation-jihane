@extends('layouts.app')

@section('content')
<main class="container posts articles">

    @foreach($thumbnails as $thumbnail)
    <article>
        <img src="{{$thumbnail->imageUrl}}" alt="image thumbnail">
        <p>{{$thumbnail->legend}}</p>
        <p><a href="/show/{{$thumbnail->id}}">Voir</a></p>
    </article>
    @endforeach

</main>
@endsection
