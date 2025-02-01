<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontController extends Controller
{
   public function vlog(){
        
      //var_dump($categories);
      $feature_posts = Post::orderBy('id','DESC')->limit(1)->first();
      $posts = Post::where('id','!=',$feature_posts->id)->orderBy('id','DESC')->paginate(10);
      return view('front.vlog',compact('posts','feature_posts'));
  }

   public function vlogPost($id){
      $post = Post::find($id);
      //var_dump($post);
      $category_id = $post->category_id;
      return view('front.vlog-post',compact('post'));
   }
   public function postCategory($category_id){
      $posts = Post::where('category_id',$category_id)->orderBy('id','DESC')->paginate(8);
      return view('front.post_category',compact('posts'));

  }
}
