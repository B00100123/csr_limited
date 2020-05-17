<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  protected $primaryKey = 'id';

  public function user(){
    return $this->belongsTo('App\User','user_id');
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [
      'user_id', 'shop_name', 'shop_details', 'shop_image', 'coffee_price', 'listing_date', 'status'
  ];
}
