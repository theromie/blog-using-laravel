<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use App\Post;


class PagesController extends Controller{
	
	public function getIndex(){
		$posts = Post::orderBy('created_at', 'desc')->paginate(5);
		return view('pages.welcome')->withPosts($posts);
	}
	public function getAbout(){
		$fname = "Romil";
		$lname = "Lodaya";

		$fullname = $fname . " " . $lname;
		$email = "romillodaya03@gmail.com";

		$data = [];
		$data['fullname'] = $fullname;
		$data['email'] = $email;
		return view('pages.about')->withData($data);
	}
}


?>