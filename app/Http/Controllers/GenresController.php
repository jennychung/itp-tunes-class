<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GenresController extends Controller
{
  public function index(){
    $genre = DB::table('genres');
    $genres = $genre->get();
    return view('genres',[
      'genres'=>$genres
    ]);
  }

}
