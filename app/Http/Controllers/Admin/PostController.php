<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    private $postValidation = [     
        'title' => 'required|max:100',
        'author' => 'required|max:40',
        'body' => 'required',
        'img_path' => 'required|image'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate($this->postValidation);

        $newPost = new Post();

        $data["slug"] = Str::slug($data['title']);
        $data["user_id"] = Auth::id();
        
        if(!empty($data["img_path"])) {
            $data["img_path"] = Storage::disk('public')->put('images', $data["img_path"]);
        }

        $newPost->fill($data);
        $saved = $newPost->save();

        if($saved) {
            Mail::to('giovanni@mail.com')->send(new SendNewMail());
            return redirect()
                ->route('admin.posts.index')
                ->with('message', 'Post ' . $newPost->title . ' creato correttamente!');
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
