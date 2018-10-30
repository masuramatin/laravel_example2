<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    //
	protected $table = 'Blogs';
public $primarykey = 'id';
public $timestamps=true;
}
