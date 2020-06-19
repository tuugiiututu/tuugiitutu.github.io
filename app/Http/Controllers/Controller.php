<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\NavParents;
use App\NavSubParents;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public static function getParents(int $var = null)
    {
        try{
            $parents = NavParents::select()->where('nav_bar_id',$var)->get();

        }catch(\Throwable  $ex){
            $parents =null;
        }

        return $parents;
    }

    public static function getSubParentName(int $var = null)
    {

        try{
            $par = NavSubParents::select()->where('parent_id',$var)->get();
        }catch(\Throwable  $ex){
            $par =null;
        }
        return $par;
    }
}
