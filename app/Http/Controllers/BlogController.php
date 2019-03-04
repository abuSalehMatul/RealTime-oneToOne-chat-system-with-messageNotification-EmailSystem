<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Nexmo\Network\Number\Request;
use App\Blog;
use App\BlogComment;
use App\User;
use Session;
use App\Balance;

use DB;

class BlogController extends Controller
{

    public function __construct()
    {
         $this -> middleware('auth');
        
    }
    

    public function myBlog(){

        $user = \Auth::user();

        $posts = Blog::where('user_id',$user->id)->latest()->paginate(5);
        
        return view('pages.blog.my_blog',compact('posts'));

    }

    public function addBlog(){

        return view('pages.blog.add_blog');


    }

    public function storeBlog(Request $request){


        $data=$request->all();
      
        $user = \Auth::user();

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $image_uploaded = $request->image->move(public_path('/uploads/blog'), $imageName);
        if ($image_uploaded) {
           
            $data['image'] = $imageName;
          
        }
        $data['user_id'] = $user->id;

        $add=Blog::create($data);

        return redirect()->to('/my-blog');

    }

    public function publicBlog(){

        $posts = Blog::latest()->paginate(5);

       

        return view('pages.blog.public-blog',compact('posts'));

    }

    public function blogDetails($id){

        $post = Blog::where('id',$id)->first();
        $comments = BlogComment::where('post_id',$id)->latest()->get();
        $users = User::all();
        $menu_options = DB::table('menu_options')->get();
        $user_menu = DB::table('user_menu')->get();

        return view('pages.blog.blog_detail',compact('post','comments','users','user_menu','menu_options'));

    }

    
//
    public function addComment(Request $request,$post_id,$user_id){

       
       $data = $request->all();
       $data['user_id'] = $user_id;
       $data['post_id'] = $post_id;

       $comment = BlogComment::create($data);

       return back();

    }

    public function deletePost($post_id){

        $deleteBlog = Blog::where('id',$post_id)->delete();
        $deleteBlogComments = BlogComment::where('post_id',$post_id)->delete();

        Session::flash('success', 'Blog Post Deleted Succcessfully!');

        return redirect()->to('/public-blog');


    }

    public function deleteComment($comment_id){

        $deleteBlogComments = BlogComment::where('id',$comment_id)->delete();

        Session::flash('success', 'Comment Deleted Succcessfully');

        return back();

    }
 
    public function updateBlogReaction(Request $request){

        $post = Blog::find($request->post_id);

        switch ($request->reaction_type) {
            case 'like':
                if($request->reaction_state == 'initial'){
                    $post->total_likes = $post->total_likes - 1; 
                }else{
                    $post->total_likes = $post->total_likes + 1; 
                }
                $post->update(); 
                return $post->total_likes;
                break;

            case 'dislike':
                if($request->reaction_state == 'initial'){
                    $post->total_dislikes = $post->total_dislikes - 1; 
                }else{
                    $post->total_dislikes = $post->total_dislikes + 1; 
                }
                $post->update();
                return $post->total_dislikes;
                break;

                case 'love':
                if($request->reaction_state == 'initial'){
                    $post->total_loves = $post->total_loves - 1; 
                }else{
                    $post->total_loves = $post->total_loves + 1; 
                }
                $post->update();
                return $post->total_loves;
                break;

                case 'happy':
                if($request->reaction_state == 'initial'){
                    $post->total_happy = $post->total_happy - 1; 
                }else{
                    $post->total_happy = $post->total_happy + 1; 
                }
                $post->update();
                return $post->total_happy;
                break;

                case 'angry':
                if($request->reaction_state == 'initial'){
                    $post->total_angry = $post->total_angry - 1; 
                }else{
                    $post->total_angry = $post->total_angry + 1; 
                }
                $post->update();
                return $post->total_angry;
                break;

                case 'sad':
                if($request->reaction_state == 'initial'){
                    $post->total_sad = $post->total_sad - 1; 
                }else{
                    $post->total_sad = $post->total_sad + 1; 
                }
                $post->update();
                return $post->total_sad;
                break;
            
            default:
                # code...
                break;
        }

    }

    public function payToRead($amount,$owner_id){

        $user = \Auth::user();
        
        $data['user_id'] = $user->id;
            $data['type'] = "db";
            $data['description'] = "Blog Read Fee";
            $data['amount'] = $amount;
            $date = date("Y-m-d");
            $data['datwise'] = $date;
            $withdraw = Balance::create($data);

            $data['user_id'] = $owner_id;
            $data['type'] = "cr";
            $data['description'] = "Blog Read Fee Collected!";
            $data['amount'] = $amount;
            $date = date("Y-m-d");
            $data['datwise'] = $date;
            $withdraw = Balance::create($data);

            return "Done";

    }


}
