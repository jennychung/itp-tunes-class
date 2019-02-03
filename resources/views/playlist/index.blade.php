@extends('layout')
@section('title', 'Playlist')
<!-- this is to change the title to "Invoices" to make it dynamic!-->
@section('main')




<div class="row">

  <div class="col-3">

    <a href="/playlists/new">Add a Playlist </a>

  <ul>
  @forelse($playlists as $playlist)
    <li>
      <a href="/playlists/{{$playlist->PlaylistId}}">
        <!-- this needs to route -->
      {{$playlist->Name}}
       </a>
    </li>

  @empty
    <!-- if empty -->
    <li> No Playlists </li>

  @endforelse
  </ul>

</div>


<div class="col-9">
<ul>
  @forelse($tracks as $track)
  <li>
    {{$track->Name}}
  </li>

  @empty

  <li> No tracks for this playlist</li>
  @endforelse
</ul>
</div>
</div>

@endsection
