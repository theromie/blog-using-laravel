<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use Session;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {        
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('posts.index')->withPosts($posts);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate data
        $this->validate($request, array(
            'title' => 'required|max:255', 
            'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'  => 'required|numeric',
            'body'  => 'required'
        ));    

        //insert data into database
        $post = new Post;

        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->category_id  = $request->category_id;
        $post->body  = Purifier::clean($request->body); 
        Auth::user()->posts()->save($post);

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Post Successfully published!');
        //redirect to home page
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $categories = Category::find($id);
        $tags = Tag::find($id);
        return view('posts.show')->withPost($post)->withCategories($categories)->withTags($tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        
        if($request->input('slug') == $post->slug){
            $this->validate($request, array(
                'title' => 'required|max:255',                
                'body' => 'required'
            ));    
        }else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'  => 'required|numeric', 
                'body' => 'required'
            ));
        }

        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->category_id  = $request->input('category_id');        
        $post->body  = Purifier::clean($request->input('body'));

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post Successfully Updated!');
        //redirect to home page
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();        
        
        Session::flash('success', 'Post Successfully Deleted!');
        return redirect()->route('posts.index');        
    }
}
