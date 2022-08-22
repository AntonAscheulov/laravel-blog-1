<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\CreatePostRequest;
use App\Http\Requests\Admin\Post\DestroyPostRequest;
use App\Http\Requests\Admin\Post\EditPostRequest;
use App\Http\Requests\Admin\Post\IndexPostRequest;
use App\Http\Requests\Admin\Post\ShowPostRequest;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(IndexPostRequest $id)
    {

        $posts = Post::paginate(10);

        return view('admin.posts.index', ['posts' => $posts]);
    }


    public function create(CreatePostRequest $request)
    {
        $categories = Category::pluck('title', 'id')->all();
        $artists = Artist::pluck('artist_name', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        return view('admin.posts.create', ['categories' => $categories, 'artists' => $artists, 'tags' => $tags]);
    }

    public function store(StorePostRequest $request, Post $post)
    {
        $post = Post::create($request->validated());
        $post->setCategory($request->get('category_id'));
        $post->setArtist($request->get('artist_id'));
        $post->setTags($request->get('tags'));


        if ($request->has('photos')) {
            foreach ($request->file('photos') as $photo) {
                $imageName = 'uploads/' . 'photo' . time() . rand(1, 1000) . '.' . $photo->extension();
                $photo->move(public_path('storage/uploads'), $imageName);
                Photo::create([
                    'post_id' => $post->id,
                    'photo' => $imageName
                ]);
            }
        }

        return redirect()->route('admin.posts.index');
    }

    public function show(ShowPostRequest $request, Post $post)
    {
        //
    }

    public function edit(EditPostRequest $request, Post $post)
    {
        $categories = Category::pluck('title', 'id')->all();
        $tags = Tag::pluck('title', 'id')->all();
        $artists = Artist::pluck('artist_name', 'id')->all();
        $selectedTags = $post->tags->pluck('id')->all();
        $photos = $post->photos()->get();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories, 'artists' => $artists, 'tags' => $tags,
            'selectedTags' => $selectedTags, 'photos' => $photos]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        $post->setCategory($request->get('category_id'));
        $post->setArtist($request->get('artist_id'));
        $post->setTags($request->get('tags'));


        if ($request->has('photos')) {
            foreach ($request->file('photos') as $photo) {
                $imageName = 'uploads/' . 'photo' . time() . rand(1, 1000) . '.' . $photo->extension();
                $photo->move(public_path('storage/uploads'), $imageName);
                Photo::create([
                    'post_id' => $post->id,
                    'photo' => $imageName
                ]);
            }
        }

        return redirect()->route('admin.posts.index');
    }

    public function destroy(DestroyPostRequest $request, Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    public function deletePhoto($id)
    {
        $photos = Photo::findOrFail($id);
            if (Storage::exists($photos->photo)){
                Storage::delete($photos->photo);
            }

        Photo::findOrFail($id)->delete();
        return back();
    }

    public function toggle($id){

        $post = Post::find($id);
        $post->togglePublished();

        return redirect()->back();
    }

}
