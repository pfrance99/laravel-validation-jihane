@extends('layouts.app')

@section('content')
<main class="container posts articles">


    @if ($message = Session::get('success'))
    <div id="flash-success" class="message status">
        <p><button onclick="undisplayFlashMsg('flash-success');">X</button> {{$message}}</p>

    </div>
    @elseif ($message = Session::get('error'))
        <div id="flash-error" class="message error">
            <p><button onclick="undisplayFlashMsg('flash-error');">X</button> {{$message}}</p>
        </div>
    @endif

    <a href="/admin/vignettes/create"><input type="submit" value="       Ajouter une vignette       "></a>

    @foreach($thumbnails as $thumbnail)
    <article>
        <img src="{{$thumbnail->imageUrl}}" alt="image thumbnail">
        <p>{{$thumbnail->legend}}</p>
        <p><a href="/admin/vignettes/{{$thumbnail->id}}">Voir</a></p>
        <p><a href="/admin/vignettes/{{$thumbnail->id}}/edit"><input type="submit" value="       Editer       "></a><p>
            <form method="POST" action="/admin/vignettes/{{$thumbnail->id}}/delete">
                @csrf
                @method('delete')
                <input type="submit" value="       Supprimer       ">
            </form>
        </p>
    </article>
    @endforeach
</main>

<script>
    //Supprime la notification flash
    function undisplayFlashMsg(id){
        document.getElementById(id).remove();
    }
</script>
@endsection
