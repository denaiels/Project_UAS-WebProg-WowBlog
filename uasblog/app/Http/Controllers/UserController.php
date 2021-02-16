<?php

namespace App\Http\Controllers;

use App\Article;
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

        return view('login', ['auth' => $auth]);
    }

    public function login(Request $request){
        // function buat login

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

            $articles = Article::all()->toQuery();
            return view('index', ['auth' => $auth, 'user' => $user , 'articles' => $articles]);
        }
        else
        {
            return view('login')->with('flash_error', 'Incorrect Username or Password');
        }
        
        
    }

    public function logout(){
        // function buat logout

        Auth::logout();

        $articles = Article::all()->toQuery()->paginate(6);
        return view('index', ['auth' => false, 'role' => 'guest', 'articles' => $articles]);
    }

    public function registerPage()
    {
        $auth = false;

        return view('register', ['auth' => $auth]);
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
        $articles = Article::all()->toQuery();

        return view('index', ['auth' => $auth, 'user' => $user , 'articles' => $articles]);
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
