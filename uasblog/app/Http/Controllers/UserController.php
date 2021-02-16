<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function loginPage(){
        // function buat return ke page login

        $auth = false;


        $categories = Category::all();
        return view('login', ['categories' => $categories, 'auth' => $auth]);
    }

    public function login(Request $request){
        // function buat login

        $categories = Category::all();

        // validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $info = $request->only('role', 'email', 'password');
        $auth = Auth::attempt($info);

        // $role = 'guest';
        // $user = new User();

        if($auth)
        {
            $remember = ($request->has('remember')) ? true : false;
            if(!empty($remember))
            {
                Auth::login(Auth::user(), true);
            }

            $user = User::where('email', $info['email'])->first();
            // $user = Auth::user();

            $articles = Article::all();
            return view('index', ['categories' => $categories, 'auth' => $auth, 'user' => $user , 'articles' => $articles]);
        }
        else
        {
            return view('login', ['categories' => $categories]);
        }
        
        
    }

    public function logout(){
        // function buat logout

        Auth::logout();

        $articles = Article::all();
        $categories = Category::all();
        return view('index', ['categories' => $categories, 'auth' => false, 'role' => 'guest', 'articles' => $articles]);
    }

    public function registerPage()
    {
        $auth = false;

        $categories = Category::all();
        return view('register', ['categories' => $categories, 'auth' => $auth]);
    }

    public function register(Request $request)
    {
        // function buat register

        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required with:password_confirmation|min:3|confirmed'
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'user';
        $user->save();

        $info = $request->only('name', 'email', 'phone', 'password');
        $auth = Auth::attempt($info);
        // $user = Auth::user();
        $articles = Article::all();
        $categories = Category::all();
        return view('index', ['categories' => $categories, 'auth' => $auth, 'user' => $user , 'articles' => $articles]);
    }

    public function adminMenu()
    {
        $auth = Auth::check();
        
        if($auth)
        {
            $user = User::where('email', Auth::user()->email)->first();
            $role = Auth::user()->role;
        }


        $categories = Category::all();
        $users = User::where('role', 'admin')->get();
        return view('admin.adminmenu', ['auth' => $auth, 'user' => $user, 'role' => $role, 'categories' => $categories, 'users' => $users]);
    }

    public function userMenu()
    {
        $auth = Auth::check();
        
        if($auth)
        {
            $user = User::where('email', Auth::user()->email)->first();
            $role = Auth::user()->role;
        }


        $categories = Category::all();
        $users = User::where('role', 'user')->get();
        return view('admin.usermenu', ['auth' => $auth, 'user' => $user, 'role' => $role, 'categories' => $categories, 'users' => $users]);
    }

    public function deleteUser($id)
    {
        $auth = Auth::check();
        if($auth)
        {
            $user = User::where('email',Auth::user()->email)->first();
            $role = Auth::user()->role;
        }
        
        $articlecur = Article::where('user_id', $id)->delete();
        $usercur = User::find($id);
        $usercur->delete();
        
        $categories = Category::all();
        $users = User::where('role', 'user')->get();
        return view('admin.usermenu', ['auth' => $auth, 'user' => $user, 'role' => $role, 'categories' => $categories, 'users' => $users]);
    }

    public function updateProfilePage()
    {
        $auth = Auth::check();
        if($auth)
        {
            $user = User::where('email',Auth::user()->email)->first();
            $role = Auth::user()->role;
        }

        $categories = Category::all();
        return view('user.updateprofile', ['user' => $user, 'categories' => $categories, 'auth' => $auth]);
    }

    public function updateProfile(Request $request)
    {
        // function buat update profile

        $auth = Auth::check();
        if($auth)
        {
            $user = User::where('email', Auth::user()->email)->first();
            $role = Auth::user()->role;
        }

        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();
        
        $articles = Article::all();
        $categories = Category::all();
        return view('index', ['categories' => $categories, 'auth' => $auth, 'user' => $user , 'articles' => $articles]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
    }
}
