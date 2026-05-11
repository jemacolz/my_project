<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $post = Post::all();
        return view('posts.index', compact('post'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $options_deliver = [
        //     'email' => 'Email',
        //     'sms' => 'SMS',
        //     'push_notification' => 'Push Notification',
        // ];
        // return view('posts.create',[
        //     'options' => $options_deliver
        // ]);

            return view('posts.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'description'=> 'required',
        ]);


        // Post::create($request->all());

        // $options_deliver = [
        //     'email' => 'Email',
        //     'sms' => 'SMS',
        //     'push_notification' => 'Push Notification',
        // ];
        // return redirect('/')
        //   ->with(['success' => 'Post Created Sucessfully haha','options' => $options_deliver]);


        Post::create($request->all());
        return redirect('/')
          ->with('success', 'Post Created Sucessfully haha');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, int $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,int $id)
    {

       $request->validate([
         'title'=> 'required',
         'content'=> 'required',
       ]);

        $posts = Post::findOrFail($id);
        $posts ->update($request->all());
        return redirect('/')
          ->with('success', 'Update Success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, int $id)
    {
        $posts = Post::findOrFail($id);
        $posts ->delete();
        return redirect('/')
        ->with('success', 'Deleted');

    }
}
