<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    //
    protected $table = 'queries';
    protected $fillable = ['name','description'];
}
