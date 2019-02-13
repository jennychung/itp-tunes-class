<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class ConfigurationsController extends Controller
{
  public function index(){
    return view('/settings', [
      'user' => Auth::user() //Auth keeps user data
    ]);
  }

  public function configure(){
    $name = DB::table('configurations') -> where('id', '=', '1');
    $maintain = $name->first();

    // $value = DB::table('configurations') -> where('value', '=', 'on')->get();
    $value= $maintain->value;
    return view('/settings', [
      'value' => $value
    ]);


  }

  public function settings(Request $request){
    $maintain = $request->all();
    $maintenance = $request->input('maintenance');

    if ($maintenance){
    DB::table('configurations')
    ->where('name', '=', 'maintenance')
    ->update([
      'value' => 'on'
    ]); }
     else {
       DB::table('configurations')
       ->where('name', '=', 'maintenance')
       ->update([
         'value' => 'off'
       ]); }

    return redirect('/settings');
    // $value= $request->value;
    // return view('/settings');
    // , [
    //   'value' => $value
    // ]);

  }
}
