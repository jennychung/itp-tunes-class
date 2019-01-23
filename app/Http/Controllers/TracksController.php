<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TracksController extends Controller
{
  public function index(Request $request){
    $query = DB::table('genres')
    ->select('tracks.Name as trackName',
              'albums.Title as albumTitle',
              'artists.Name as artistName',
              'tracks.UnitPrice as unitPrice')
    ->join('tracks', 'genres.GenreId', '=', 'tracks.GenreId')
    ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
    ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId');

  if($request->query('genre')){
    $query->where('genres.Name','=',$request->query('genre'));
  }

    $genres = $query->get();
    return view('tracks',[
      'tracks'=>$genres,
      'name'=>$request->query('genre')
    ]);

  }
}
