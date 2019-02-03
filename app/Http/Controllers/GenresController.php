<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{
  public function index(){
    $genre = DB::table('genres');
    $genres = $genre->get();
    return view('genres',[
      'genres'=>$genres
    ]);
  }

  public function show($genreId = null)
  //playlistid has to be defined, there isn't a url parameter
  {
    $genre = DB::table('genres')
    // ->where('GenreId','=', $genreId)
    // ->first();
    ->get();

    if($genreId) {
    $genres = DB::table('genres') //pulling from genres table
      ->where('GenreId',$genreId)
      ->first();
      // ->get();

        // dd($genres);
      }else{
        $genres=[];
        //if there's no playlist id, return blank.
      }
//
    return view('genre.index', [ //takes general template and puts it in the main spot
      'genres' => $genres //accessing playlists in controller
    ]);
  }


  public function create()
  {
    return view('genre.index');
  }

  public function store(Request $request)
  {

    // validate name
    //getting input:
    $input = $request->all();
    $validation = Validator::make($input, [
      'name'=>'required|min:3|unique:genres,Name' //good validator class. if input is there pass, if not fail
    ]);

    // if validation fails, redirect back to form with error messages.
    if ($validation->fails()){
      // $a = "'/genres/' + {{$genre->GenreId}}+ '/edit'";
      // $a = '/genres/'+ $request->genreId + '/edit';
      return back()
      // redirect("/genres")
      ->withInput() //can also print out errors with input.
      ->withErrors($validation); //prints out errors compared with validation.
    }
    // otherwise, insert playlist into the database
    DB::table('genres')
    ->where('GenreId','=', $request->genreId)
    ->update([
      //method called insert
      'Name' => $request->name //name column, request name from form
    ]);

    //redirect back to playlist.
    return redirect('/genres');
  }

}
