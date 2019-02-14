@extends('layouts.app')

@section('content')
<main class="container posts article">
    @if (isset($thumbnail))
    <article>
        <img src="{{$thumbnail->imageUrl}}" alt="thumbnail image">
        <div class="infos"> {{$thumbnail->legend}}
       </div>

        <p>{{$thumbnail->description}}</p>
    </article>
    @else
    <div class="message error">
        <p>Aucune vignette ne correspond à cet identifiant</p>
    </div>

    @endif
</main>
@endsection
