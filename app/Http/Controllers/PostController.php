<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Notification;
use Illuminate\Http\Request;

class PostController extends Controller
{

public function timeline(){

$posts = Post::latest()->get();

return view('timeline',compact('posts'));
}

public function post(Request $req){

$image=null;

if($req->file('image')){
$image = $req->file('image')->store('images','public');
}

Post::create([
'user_id'=>session('user'),
'body'=>$req->body,
'image'=>$image
]);

return back();
}

public function like($id){

Like::firstOrCreate([
'user_id'=>session('user'),
'post_id'=>$id
]);

return back();
}

public function repost($id){

Post::create([
'user_id'=>session('user'),
'repost_id'=>$id
]);

return back();
}

public function reply(Request $req,$id){

Post::create([
'user_id'=>session('user'),
'body'=>$req->body,
'reply_to'=>$id
]);

return back();
}

}