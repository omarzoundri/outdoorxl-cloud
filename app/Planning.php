<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
   	protected $table = 'planning';

    protected $fillable = ['date', 'day', 'unavailable', 'from', 'untill', 'user_id', 'status'];
}
