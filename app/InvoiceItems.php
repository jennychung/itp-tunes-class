<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItems extends Model
{
  protected $primaryKey = 'InvoiceLineId';
  public $timestamps = false;

  public function invoice()
  {
    return $this->belongsTo('App\Invoices', 'InvoiceId');
  }

}
