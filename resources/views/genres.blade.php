@extends('layout')
@section('title', 'Genres')
@section ('main')

<h1 style="text-align: center; padding-bottom: 20px;"> Genres </h1>
<p style="text-align: center; ">
  <!-- blade for each -->
  @foreach($genres as $genre)
  <a href="/tracks?genre={{urlencode($genre->Name)}}">
        {{$genre->Name}} </a> <br>
  @endforeach
</p>



@endsection
