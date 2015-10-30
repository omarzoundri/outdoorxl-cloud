<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Auth\Authenticatable;
// use Illuminate\Foundation\Auth\Access\Authorizable;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Division extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'divisions';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['division'];
}
