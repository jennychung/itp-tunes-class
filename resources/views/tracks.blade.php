@extends('layout')
@section('title', 'Tracks')
<!-- @section('navbar') -->
@section ('main')


<div style="text-align:center; margin-bottom:80px;">
<button type="submit" class="btn btn-light btn-block" >
<a href="/tracks/new">Add a Playlist </a>
</button>
</div>

<h1 style="text-align:center; padding-bottom: 20px;"> {{$name}} </h1>

<table class="table">
  <tr>
    <th> Track Name </th>
      <th> Album Title </th>
      <th> Artist Name </th>
      <th> Price </th>
  </tr>

  <!-- blade for each -->
  @forelse($tracks as $genre)
       <tr>
         <td>
           {{$genre->trackName}}
         </td>
         <td>
           {{$genre->albumTitle}}
         </td>
         <td>
           {{$genre->artistName}}
         </td>
         <td>
           {{$genre->unitPrice}}
         </td>
         <!-- <td>
           {{$genre->genreName}}
         </td> -->
       </tr>
       @empty
       <tr>
         <td colspan="4"> No tracks found </td>
       </tr>
     @endforelse

</table>

@endsection
