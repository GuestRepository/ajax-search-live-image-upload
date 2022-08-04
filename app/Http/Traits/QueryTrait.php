<?php
namespace App\Http\Traits;

use App\Models\Profile;

trait Querytrait{
    public function getProfileDetils($id){
        $single = Profile::where('id',$id)->first();
        return $single;
    }
}
