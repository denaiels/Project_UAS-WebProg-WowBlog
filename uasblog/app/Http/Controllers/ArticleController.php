<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::check();
        $role = 'guest';
        $name = '';
        $user = new User();
        
        if($auth)
        {
            $user = User::where('email',Auth::user()->email)->first();
            $role = Auth::user()->role;
        }

        $categories = Category::all();
        $articles = Article::all();
        return view('index', ['auth' => $auth, 'user' => $user, 'role' => $role, 'categories' => $categories, 'articles' => $articles]);
    }

    public function detailArticle($id)
    {
        $auth = Auth::check();
        $role = 'guest';
        $user = new User();
        if($auth)
        {
            $user = User::where('email',Auth::user()->email)->first();
            $role = Auth::user()->role;
        }

        $categories = Category::all();
        $article = Article::where('id', $id)->first();
        return view('article', ['article' => $article , 'user' => $user, 'role' => $role, 'categories' => $categories, 'auth' => $auth]);
    }

    public function blogMenu()
    {
        $auth = Auth::check();
        
        if($auth)
        {
            $user = User::where('email', Auth::user()->email)->first();
            $role = Auth::user()->role;
        }

        $categories = Category::all();
        $articles = Article::where('user_id', $user->id)->get();
        return view('user.blogmenu', ['auth' => $auth, 'user' => $user, 'role' => $role, 'categories' => $categories, 'articles' => $articles]);
    }

    public function createBlogPage()
    {
        $auth = Auth::check();
        
        if($auth)
        {
            $user = User::where('email', Auth::user()->email)->first();
            $role = Auth::user()->role;
        }

        $categories = Category::all();
        return view('user.createblog', ['auth' => $auth, 'user' => $user, 'role' => $role, 'categories' => $categories]);
    }

    public function createBlog(Request $request)
    {
        $auth = Auth::check();
        
        if($auth)
        {
            $user = User::where('email', Auth::user()->email)->first();
            $role = Auth::user()->role;
        }

        $article = new Article;
        $article->title = $request->input('title');
        $article->user_id = $user->id;
        $article->category_id = $request->input('category');
        $article->description = $request->input('description');

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName().'.'.$image->getClientOriginalExtension();
        $image->move('assets', $imageName);
        $article->image = $imageName;
        $article->save();

        $articles = Article::where('user_id', $user->id)->get();
        $categories = Category::all();
        return view('user.blogmenu', ['auth' => $auth, 'user' => $user, 'role' => $role, 'articles' => $articles, 'categories' => $categories]);
    }

    public function deleteBlog($id)
    {
        $auth = Auth::check();
        if($auth)
        {
            $user = User::where('email',Auth::user()->email)->first();
            $role = Auth::user()->role;
        }
        
        $article = Article::find($id);
        $article->delete();
        $articles = Article::where('user_id', $user->id)->get();
        $categories = Category::all();
        return view('user.blogmenu', ['auth' => $auth, 'user' => $user, 'role' => $role, 'articles' => $articles, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
