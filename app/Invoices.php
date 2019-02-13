<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
  protected $primaryKey = 'InvoiceId';
  public $timestamps = false;

  public function items()
  {
    return $this->hasMany('App\InvoiceItems', 'InvoiceId');
  }

}
