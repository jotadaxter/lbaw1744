<?php

namespace VAPOR;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'Products';
  protected $id = 'product_id';
  protected $primaryKey = 'product_id';

  protected $fillable = ['user_id', 'description', 'release_date','operating_system','price','logo_path','name','hidden','developer','publisher'];


  /**, 
   * The user this product belongs to
   */
  public function user() {
    return $this->belongsTo('VAPOR\User');
  }
}
