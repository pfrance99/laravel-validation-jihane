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
    <form method="POST" action="/admin/vignettes/create">
        @csrf
        <input type="text" name="legend" placeholder="Légende de la vignette (70 charactères max)"/>
        <input type="text" name="imageUrl" placeholder="Url de la vignette (250 charactères max)"/>
        <textarea name="description" placeholder="Description de la vignette"></textarea>
        <input type="submit" value="Créer">
    </form>
</main>

@endsection
