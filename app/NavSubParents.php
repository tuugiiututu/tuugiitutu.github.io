<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavSubParents extends Model
{
    protected $table = 'nav_sub_parent';
    protected $primaryKey = 'id';
    public  $timestamps  =false;

}
