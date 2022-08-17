<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Exhibition;
use App\Models\Tag;
use App\Services\Weather\Interfaces\WeatherServiceContract;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(3);
        $exhibitions = Exhibition::all();
        return view('pages.index', ['posts' => $posts], ['exhibitions' => $exhibitions]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function artists(){

        $atrists = Artist::Paginate(6);
        return view('pages.artists', ['artists' => $atrists]);
    }

    public function exhibitions(){
        $exhibitions = Exhibition::Paginate (6);
        return view('pages.exhibitions', ['exhibitions' => $exhibitions]);
    }

    public function portfolios(){
        $posts = Post::paginate(6);
        return view('pages.portfolios', ['posts' => $posts]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('pages.show', ['post' => $post]);
    }

    public function artistSingle($id){
        $artist = Artist::where('id', $id)->firstOrFail();
        $posts = $artist->posts()->paginate(3);
        return view('pages.artistSingle', ['artist' => $artist], ['posts' => $posts]);
    }




    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->paginate(3);
        return view('pages.list', ['posts' => $posts]);

    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(3);
        return view('pages.list', ['posts' => $posts]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
