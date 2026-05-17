<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Illuminate\View\View;

class PostController extends Controller implements HasMiddleware
{
    // implement roles and behaviors for post controller
    public static function middleware(): array
    {
        return [
            new Middleware ('auth', except:['orig']),
        ];
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // check if user is authenticated
        $post = Post::all();
        return view('posts.index', ['post' => $post]);

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

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'gender' => 'required',
        'civil_status' => 'required',
    ]);


    // apply new data
    $post = Post::findOrFail($id);

   $post->fill($request->only([
    'title',
    'content',
    'gender',
    'civil_status'
]));

if (!$post->isDirty()) {
    return back()->with('info', 'No changes detected');
}

$post->save();

return back()->with('success', 'Success edit');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $posts = Post::findOrFail($id);
        $posts ->delete();
        return redirect('/')
        ->with('success', 'Deleted');

    }
}
