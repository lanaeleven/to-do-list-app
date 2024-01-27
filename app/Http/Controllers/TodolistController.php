<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class TodolistController extends Controller
{
    public function index(): View 
    {
        $todolists = DB::table('todolists')->orderBy('created_at', 'desc')->get();
        return view('home', ['todolists' => $todolists]);
    }

    public function storeTodo(Request $request): RedirectResponse
    {
        $todo = $request->input('todo');

        DB::table('todolists')->insert([
            'todo' => $todo,
            'created_at' => Carbon::now()
        ]);

        return redirect('/');
    }

    public function removeTodo($id): RedirectResponse
    {
        DB::table('todolists')->where('id', '=', $id)->delete();
        return redirect('/');
    }
}
