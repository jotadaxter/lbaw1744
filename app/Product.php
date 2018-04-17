<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'Products';
  protected $id = 'product_id';
  protected $primaryKey = 'product_id';
  /**
   * The user this product belongs to
   */
  public function user() {
    return $this->belongsTo('App\User');
  }
}
