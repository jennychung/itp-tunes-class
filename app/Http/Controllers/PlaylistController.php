<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class PlaylistController extends Controller
{
    public function index($playlistId = null)
    //playlistid has to be defined, there isn't a url parameter
    {
      $playlists = DB::table('playlists')-> get();

      if($playlistId) {
      $tracks = DB::table('tracks') //pulling from tracks table
        ->join('playlist_track', 'tracks.TrackId', '=', 'playlist_track.TrackID') //join on track table where tracks at trackId =
        ->where('PlaylistId','=', $playlistId)
        ->get();

          // dd($tracks);
        }else{
          $tracks=[];
          //if there's no playlist id, return blank.
        }
  //
      return view('playlist.index', [ //takes general template and puts it in the main spot
        'playlists' => $playlists, //accessing playlists in controller
        'tracks' => $tracks
      ]);
    }


// public function show($playlistId)
//the id inside show can be anything but it refers to the route
// public function index($playlistId)
// {
//
//   //this grab associated playlist, get tracks, show on ldap_control_paged_result
//   $tracks = DB::table('tracks') //pulling from tracks table
//     ->join('playlist_track', 'tracks.TrackId', '=', 'playlist_track.TrackID') //join on track table where tracks at trackId =
//     ->where('PlaylistId','=', $playlistId)
//     ->get();
//
//       dd($tracks);
// }




  public function create()
  {
    return view('playlist.create');
  }

  public function store(Request $request)
  {

    // validate name
    //getting input:
    $input = $request->all();
    $validation = Validator::make($input, [
      'name'=>'required|min:5|unique:playlists,Name' //good validator class. if input is there pass, if not fail
    ]);

    // if validation fails, redirect back to form with error messages.
    if ($validation->fails()){
      return redirect('/playlists/new')
      ->withInput() //can also print out errors with input.
      ->withErrors($validation); //prints out errors compared with validation.
    }
    // otherwise, insert playlist into the database
    DB::table('playlists')->insert([
      //method called insert
      'Name' => $request->name //name column, request name from form
    ]);

    //redirect back to playlist.
    return redirect('/playlists');
  }
}
