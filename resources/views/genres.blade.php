@extends('layout')
@section('title', 'Genres')
@section ('main')

<h1 style="text-align: center; padding-bottom: 20px;"> Genres </h1>
<div style="text-align: center; ">
  <!-- blade for each -->
  @foreach($genres as $genre)
    <div class="row">
        <div class="col" style="text-align: right;">
            <a href="/tracks?genre={{urlencode($genre->Name)}}"> {{$genre->Name}} </a>
        </div>
        <div class="col" style="text-align: left;">
          <a style="color:#bcc4d1;" href="/genres/{{$genre->GenreId}}/edit"> Edit </a>
        </div>
    </div>
  @endforeach
</div>

@endsection
