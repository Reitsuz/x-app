<?php

namespace App\Http\Controllers;

use App\Models\Follow;

class FollowController extends Controller
{

public function follow($id){

Follow::firstOrCreate([
'user_id'=>session('user'),
'follow_id'=>$id
]);

return back();
}

public function unfollow($id){

Follow::where('user_id',session('user'))
->where('follow_id',$id)
->delete();

return back();
}

}