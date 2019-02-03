<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TracksController extends Controller
{
  public function index(Request $request){
    $query = DB::table('genres')
    ->select('tracks.Name as trackName',
              'albums.Title as albumTitle',
              'artists.Name as artistName',
              'tracks.UnitPrice as unitPrice',
              'media_types.Name as mediaType',
              'tracks.Composer as composer',
              'tracks.Milliseconds as milliseconds',
              'tracks.Bytes as bytes',
              'genres.Name as genreName')
    ->join('tracks', 'genres.GenreId', '=', 'tracks.GenreId')
    ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
    ->join('media_types', 'tracks.MediaTypeId', '=', 'media_types.MediaTypeId')
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


  public function create()
  {
      $albumquery = DB::table('albums'); //taking from table named albums and putting it in a variable
      $albums = $albumquery->get(); //storing albumquery from table into a new variable we're calling albums

      $mediaquery = DB::table('media_types'); //renaming to make it link to search
      $media_types = $mediaquery->get(); //linking to query

      $genrequery = DB::table('genres'); //renaming to make it link to search
      $genres = $genrequery->get(); //linking to query

      return view('tracks.create', [ //takes general template and puts it in the main spot
        'albums' => $albums, //accessing playlists in controller
        'media_types' => $media_types,
        'genres' => $genres
      ]);
  }

  public function store(Request $request)
  {
    // validate name
    //getting input:
    $input = $request->all();
    $validation = Validator::make($input, [
      'album'=>'required',
      'media'=>'required',
      'genres'=>'required',
      'name'=>'required',
      'composer'=>'required',
      'milliseconds'=>'required|numeric',
      'bytes'=>'required|numeric',
      'price'=>'required|numeric'

       //good validator class. if input is there pass, if not fail
    ]);

    // if validation fails, redirect back to form with error messages.
    if ($validation->fails()){
      return redirect('/tracks/new')
      ->withInput() //can also print out errors with input.
      ->withErrors($validation); //prints out errors compared with validation.
    }
    // otherwise, insert playlist into the database
    DB::table('tracks')->insert([
      //method called insert
      'Name' => $request->name,
      'AlbumId' => $request->album,
      'MediaTypeId' => $request->media,
      'GenreId' => $request->genres,
      'Composer' => $request->composer,
      'Milliseconds' => $request->milliseconds,
      'Bytes' => $request->bytes,
      'UnitPrice' => $request->price,
       //name column, request name from form
    ]);
    //insert the id's also.

    //redirect back to playlist.
    return redirect('/tracks');
  }

}
