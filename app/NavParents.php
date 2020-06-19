<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavParents extends Model
{
    protected $table = 'nav_parents';
    protected $primaryKey = 'id';
    public  $timestamps  =false;

}
