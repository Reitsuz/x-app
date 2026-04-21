<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{

public function index(){

$notifications = Notification::where(
'user_id',session('user')
)->latest()->get();

return view('notifications',compact('notifications'));
}

public function read($id){

Notification::where('id',$id)->update([
'read'=>true
]);

return back();
}

}