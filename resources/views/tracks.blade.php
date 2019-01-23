@extends('layout')
@section('title', 'Tracks')
@section ('main')

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
       </tr>
       @empty
       <tr>
         <td colspan="4"> No tracks found </td>
       </tr>
     @endforelse

</table>
