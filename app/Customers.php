<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
  protected $primaryKey = 'CustomerId';
  public $timestamps = false;
}
