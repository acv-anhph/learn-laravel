<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function showContactForm(){
		return view('frontend.contact');
	}

	public function insertMessage(Request $request){
		$name    = $request->input('name');
		$title   = $request->input('title');
		$message = $request->input('message');

		// Insert message vào database, tạm thời coi như đã cập nhật database
		// chúng ta sẽ trở lại phần này trong những bài viết sau

		return view('frontend.contact')->with(['success' => 'Bạn đã gửi tin nhắn thành công!', 'name' => $name, 'title' => $title, 'message' => $message]);
	}
}
