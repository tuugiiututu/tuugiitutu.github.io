<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NavBar;
use App\NavParents;
use App\NavSubParents;


class MyController extends Controller
{
    public function index()
    {
        $navs= NavBar::select()->get();
        return view('welcome',compact('navs'));
    }
    public function election()
    {
        $navs= NavBar::select()->get();
        return view('election',compact('navs'));
    }
    public function education()
    {
        $navs= NavBar::select()->get();
        return view('education',compact('navs'));
    }
    public function news()
    {
        $navs= NavBar::select()->get();
        return view('news',compact('navs'));
    }
    public function around()
    {
        $navs= NavBar::select()->get();
        return view('around',compact('navs'));
    }
    public function page()
    {
        $navs= NavBar::select()->get();
        return view('page',compact('navs'));
    }
    public function makeMenu(Request $request)
    {
        if($request->has('menu')){
            $n = new NavBar();
        try {
            $n->name=$request->input('mName');
            $n->url=$request->input('mUrl');
            $n->parent_id=$request->input('mParent');
            $n->save();
            return back()->with('success','Амжилттай хадгалагдлаа');
        } catch (\Throwable $th) {
            $n->delete();
            return back()->with('error',$th);
        }

        }
        if($request->has('parent')){
            $n = new NavParents();
            try {
                $n->name=$request->input('pmName');
                $n->url=$request->input('pmUrl');
                $n->nav_bar_id=$request->input('pmMenu');
                $n->sub_parent_id=$request->input('pmSubMenu');
                $n->save();
                return back()->with('success','Амжилттай хадгалагдлаа');
            } catch (\Throwable $th) {
                $n->delete();
                return back()->with('error',$th);
            }
        }
        if($request->has('sub')){
            $n = new NavSubParents();
            try {
                $n->sub_name=$request->input('smName');
                $n->sub_url=$request->input('smUrl');
                $n->parent_id=$request->input('smMenu');
                $n->save();
                return back()->with('success','Амжилттай хадгалагдлаа');
            } catch (\Throwable $th) {
                $n->delete();
                return back()->with('error',$th);
            }
        }
        if($request->has('deleteMenu')){
            NavBar::where('id',$request->input('id'))->delete();
        }
        if($request->has('deleteParent')){
            NavParents::where('id',$request->input('id'))->delete();
        }
        if($request->has('deleteSub')){
            NavSubParents::where('id',$request->input('id'))->delete();
        }
        if($request->has('editMenu')){
            try {
                NavBar::where('id',$request->input('id'))->update([
                    'name'=>$request->input('emName'),
                    'url'=>$request->input('emUrl'),
                    'parent_id'=>$request->input('emParent'),
                ]);
                return back()->with('success','Амжилттай хадгалагдлаа');
            } catch (\Throwable $th) {
                return back()->with('error',$th);
            }
        }
        if($request->has('editParent')){
            try {
                NavParents::where('id',$request->input('id'))->update([
                    'name'=>$request->input('pmName'),
                    'url'=>$request->input('pmUrl'),
                    'nav_bar_id'=>$request->input('pmMenu'),
                    'sub_parent_id'=>$request->input('pmSubMenu'),
                ]);
                return back()->with('success','Амжилттай хадгалагдлаа');
            } catch (\Throwable $th) {
                return back()->with('error',$th);
            }
        }
        if($request->has('editSubMenu')){
            try {
                NavSubParents::where('id',$request->input('id'))->update([
                    'sub_name'=>$request->input('smName'),
                    'sub_url'=>$request->input('smUrl'),
                    'parent_id'=>$request->input('smMenu')
                ]);
                return back()->with('success','Амжилттай хадгалагдлаа');
            } catch (\Throwable $th) {
                return back()->with('error',$th);
            }
        }
        $navs= NavBar::select()->get();
        $parents= NavParents::select()->get();
        $subParents= NavSubParents::select()->get();
        return view('menuBuilder',compact('navs','parents','subParents'));
    }
}
