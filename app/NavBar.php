<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavBar extends Model
{
    protected $table = 'nav_bars';
    protected $primaryKey = 'id';
    public  $timestamps  =false;

}
