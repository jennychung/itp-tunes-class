<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InvoicesController extends Controller
{
    public function index(Request $request)
    {
      // $invoices = DB::table('invoices')
      $query = DB::table('invoices')
     ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId');
      //function called table called invoices getting all the results
      //essentially a select all from statement
      //select * from invoices
      // $semester = 'Spring 2019';
      // $course = 'ITP 405';

      //add query for where the first name equals to search.
      //simiar to $_GET['search']
      //in laravel: use request that passes into index. in the public func
      if ($request->query('search')) {
          $query->where('FirstName', '=', $request->query('search'));
          $query->orWhere('LastName', '=', $request->query('search'));
        }

        $invoices = $query->get();

        return view('invoices', [
          'invoices' => $invoices,
          'search' => $request->query('search')
        // 'uscSemester' => $semester,
        // 'course'=> $course
      ]);
    }
}
