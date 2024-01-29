<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class TodolistController extends Controller
{
    public function index(Request $request): View 
    {
        if ($request->session()->has('userId')) {
            $userId = $request->session()->get('userId');
            $userId = $userId[0]->id;
            $name = DB::table('users')->select('name')->where('id', '=', $userId)->get()[0]->name;
            $todolists = DB::table('todolists')->where('user_id', '=', $userId)->orderBy('created_at', 'desc')->get();
            return view('home', ['todolists' => $todolists, 'userId' => $userId, 'name' => $name]);
        }else {
            return view('login');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('userId');
        return redirect('/');
    }

    public function storeTodo(Request $request): RedirectResponse
    {
        $todo = $request->input('todo');
        $userId = $request->input('userId');

        DB::table('todolists')->insert([
            'todo' => $todo,
            'user_id' => $userId,
            'created_at' => Carbon::now()
        ]);

        return redirect('/');
    }

    public function removeTodo($id): RedirectResponse
    {
        DB::table('todolists')->where('id', '=', $id)->delete();
        return redirect('/');
    }

    public function register(Request $request): RedirectResponse
    { 
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        if (DB::table('users')->where('email', $email)->exists()) {
            return redirect('/register-view');
        } else {
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
    
            return redirect('/');
        }
    }

    public function login(Request $request): RedirectResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');
        // $hasil = [$email, $password, DB::table('users')->where('email', '=', $email)->where('password','=', $password)->count()];
        // dd($hasil);

        if (DB::table('users')->where('email', '=', $email)->where('password','=', $password)->count() > 0) {
            $userId = DB::table('users')->select('id')->where('email', '=', $email)->where('password','=', $password)->get();
            $request->session()->put('userId', $userId);
            return redirect('/');
        } else {
            return redirect('/login-view');
        }
    }
}
