<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $primaryKey = 'id';

  public function user(){
    return $this->hasMany(User::class);
  }

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

   protected $fillable = [
     'role'
   ];
}
