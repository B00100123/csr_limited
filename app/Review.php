<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
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
      'user_id', 'shop_id', 'star_rating', 'review_details', 'review_member_type', 'review_status', 'review_date'
  ];
}
