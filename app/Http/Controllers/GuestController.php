<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
// use App\Http\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller
{
    // use QueryTrait;

    public function index(){
        $pages = Profile::all();
        return view('pages',compact('pages'));
    }

    public function create(){
        $pages = DB::table('profiles')->orderBy('created_at','desc')->paginate(3);
        return view('createpage',compact('pages'));
    }

    public function store(Request $request){
        
        $key  =rand(99,999);
        $file= $request->file('image');
        $filename= $key.$file->getClientOriginalName();
        $imageData =  $file->move(public_path('/storage/Image'), $filename);

        // $file = $request->file('image');
        // $filename = $file->getClientOriginalName();
        // $imageData = $file->move(public_path('storage/image'),$filename);

        $data = new Profile();
        $data->username = $request->username;
        $data->image_title = $request->image_title;
        $data->image = $filename;
        $data->save();
        return redirect()->route('create');
    }

    function image_filter(Request $request){
        if($request->ajax()){
            $filter = $request->get('manual_filter_table');
            $keysearch = str_replace("","%",$filter);
            $pages = DB::table('profiles')
            ->where('profiles.username','like','%'.$keysearch.'%')
            ->where('profiles.image_title','like','%'.$keysearch.'%')
            ->orderBy('created_at','desc')->paginate(3);
            Log::info('after search data'.$pages);
            return view('paginated',compact('pages'));

        }
    }
}
