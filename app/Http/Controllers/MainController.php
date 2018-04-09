<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
	public function checkRole(){
		echo "<br>2. MainController@checkRole";
		echo "<br>Main Controller: checkRole function";
		echo "<br>Thực hiện sau khi qua bộ lọc Middleware và trước khi gửi HTTP response";
	}

	public function showNews ($news_id_string) {
		$new_array = explode('-', $news_id_string);
		$news_id = end($new_array);

		$news_title = 'Bài viết Laravel mới với ID là ' . $news_id;

		return view('frontend.news-detail')->with(['news_id' => $news_id, 'news_title' => $news_title]);
	}

	public function uriTest(Request $request){
		// ví dụ URL http://laravel.dev/category/laravel-nang-cao
		$uri = $request->path();
		// trả về category/laravel-nang-cao
		echo $uri;

		if ($request->is('admin/*')) {
			// các đường dẫn bắt đầu bằng admin/ được xử lý
			// ví dụ http://laravel.dev/admin/product/create, http://laravel.dev/admin/news/create
			echo '<br>Admin path';
		}
		if ($request->is('category/laravel-nang-cao')) {
			echo '<br>Đường dẫn bạn vừa truy nhập đúng là http://laravel.dev/' . $request->path();
		}

		// ví dụ đường dẫn http://laravel.dev/category/laravel-nang-cao?page=3&lang=vn
		$url = $request->url();
		// trả về http://laravel.dev/category/laravel-nang-cao
		echo '<br>Đường dẫn đầy đủ: ' . $url;

		// ví dụ đường dẫn http://laravel.dev/category/laravel-nang-cao?page=3&lang=vn
		$full_url = $request->fullurl();
		// trả về http://laravel.dev/category/laravel-nang-cao?page=3&lang=vn
		echo '<br>Đường dẫn đầy đủ cả query string' . $full_url;

		$method = $request->method();

		echo '<pre>';
		var_dump($method);
		echo '</pre>';
		if ($request->isMethod('post')) {
			echo '<br>POST request';
		} else {
			echo '<br>GET request';
		}

		$ip_address = $request->ip();
		echo '<br>Địa chỉ IP người dùng: ' . $ip_address;

		$server_address = $request->server('SERVER_ADDR');
		echo '<br>Địa chỉ IP máy chủ: ' . $server_address;

		$url_referer = $request->server('URL_REFERER');
		echo '<br>Đường dẫn xuất phát: ' . $url_referer;

		echo '<pre>';
		var_dump($request->header());
		echo '</pre>';
	}
}
