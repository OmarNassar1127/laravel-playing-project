<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    public function contact(){
        $people = ['Edwin', 'Omar', 'Desi', 'Cris', 'Paps', 'Ova', 'Waxxer'];
        return view('contact', ['people' => $people]);
    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('/posts.show', compact('post'));
    }

    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }
    
    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request->all();
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $path = $file->storeAs('', $name, 'public');
            $input['path'] = $path;
    
            if (!empty($post->path)) {
                // Delete the existing image
                Storage::disk('public')->delete($post->path);
            }
        }
    
        $post->update($input);
        return redirect('/posts');
    }
    
    

    /**
     * Display a listing of the resource.
     */

     public function edit($id){
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
     }
 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $user = User::findOrFail(1);
        $input = $request->all();

        if($file = $request->file('file')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['path'] = $name;
        }
        $input['user_id'] = $user->id;
        Post::create($input);
        return redirect('/posts');
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);
        // $user = User::findOrFail(1);
        // $data = $request->all();
        // $data['user_id'] = $user->id;
        // Post::create($data);

    //    $file = $request->file('file');

    //    echo "<br>";

    //    echo $file->getClientOriginalName();

    //    echo "<br>";

    //    echo $file->getClientOriginalExtension();
        
    }


    /**
     * Display the specified resource.
     */
    

}
