<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function create(Thread $thread)
    {
        $categories= Category::get();

        return view('thread.create', compact('categories', 'thread'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'=> 'required',
            'title'=> 'required',
            'body'=> 'required',

        ]);

        auth()->user()->threads()->create($request->all());
        return redirect()->route('dashboard');
    }

    public function edit(thread $thread)
    {
        $categories= Category::get();

        return view('thread.edit', compact('categories', 'thread'));
    }

    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'category_id'=> 'required',
            'title'=> 'required',
            'body'=> 'required',

        ]);

        $thread->update($request->all());
        return redirect()->route('thread', $thread);
    }

}
