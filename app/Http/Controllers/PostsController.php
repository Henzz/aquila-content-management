<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->Paginate(10);
        return view('posts.index', compact('posts', $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image' => 'max:1999',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->image = $request->input('image');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->category = $request->input('category');
        $post->save();

        return redirect('/posts')->with('Success', 'Post Created');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
        else return redirect('/posts');

        //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('Error', 'Not Authorized For Deletion');
        }
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
        return view('posts.show', compact('post', $post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check if authorized
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('Error', 'What Do You Think You`re Doin`, Careful!!');
        }

        // if authorized send to edit page
        return view('posts.edit')->with('post',$post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'image' => 'max:1999',
            'cover_image' => 'max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Update Post
        $post = Post::find($id);

        // Check if it`s correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect ('/posts')->with('Error', 'Unauthorized Page');
        }

        // If authorized then update
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category = $request->input('category');
        $post->image = $request->input('image');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }

        // Save data
        $post->save();

        return redirect()->route('posts.show', [$post])->with('Success', 'Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check if it`s correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('Error','Unauthorized Page');
        }

        // To check if it have it`s own image to delete if not keep noimage.jpg file
        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        // If authorized then delete
        $post->Delete();

        return redirect('/posts')->with('Success','Post Removed');
    }

    public function undelete($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id != $post->user_id){
            return redirect()->route('posts.show',[$post])->with('Error', 'Heyy Hey Am Watchin You!!');
        }

        return redirect()->route('posts.show', [$post])->with('Success', 'Please Click On The Delete Button Below');
    }
}
