@extends('layouts.app')

@section('content')
<main class="container auth">

    @if ($errors->any())
        <div class="message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    </br>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/admin/vignettes/{{$thumbnail->id}}/edit">
        @csrf
        @method('put')
        <input type="text" name="legend" value="{{$thumbnail->legend}}" placeholder="Légende de la vignette (70 charactères max)"/>
        <input type="text" name="imageUrl" value="{{$thumbnail->imageUrl}}" placeholder="Url de la vignette (250 charactères max)"/>
        <textarea name="description" placeholder="Description de la vignette">{{$thumbnail->description}}</textarea>
        <input type="submit" value="Update">
    </form>
</main>

@endsection
