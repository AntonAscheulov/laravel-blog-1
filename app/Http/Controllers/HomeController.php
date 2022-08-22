<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Exhibition;
use App\Models\Tag;
use App\Services\Weather\Interfaces\WeatherServiceContract;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('is_published', '1')->inRandomOrder()->paginate(3);
        $exhibitions = Exhibition::whereDate('date_end', '>=', Carbon::now()->today())->whereDate('date_start', '<=', Carbon::now()->today())->get();
        return view('pages.index', ['posts' => $posts], ['exhibitions' => $exhibitions]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function artists()
    {

        $atrists = Artist::Paginate(6);
        return view('pages.artists', ['artists' => $atrists]);
    }

    public function exhibitions()
    {
        $exhibitions = Exhibition::Paginate(3);
        return view('pages.exhibitions', ['exhibitions' => $exhibitions]);
    }

    public function portfolios()
    {
        $posts = Post::where('is_published', '1')->paginate(6);
        return view('pages.portfolios', ['posts' => $posts]);
    }


    public function about()
    {
        $exhibitionNow = Exhibition::whereDate('date_end', '>=', Carbon::now()->today())->whereDate('date_start', '<=', Carbon::now()->today())->inRandomOrder()->first();
        $exhibitionFuture = Exhibition::whereDate('date_start', '>', Carbon::now()->today())->inRandomOrder()->first();
        $exhibitionsPast = Exhibition::whereDate('date_end', '<', Carbon::now()->today())->get();
        return view('pages.about', ['exhibitionNow' => $exhibitionNow,
            'exhibitionFuture'=>$exhibitionFuture], ['exhibitionsPast' => $exhibitionsPast]);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $photos = $post->photos()->get();
        return view('pages.show', ['post' => $post], ['photos' => $photos]);
    }

    public function artistSingle($id)
    {
        $artist = Artist::where('id', $id)->firstOrFail();
        $posts = $artist->posts()->where('is_published', '1')->get();
        $exhibitions = $artist->exhibitions()->get();
        return view('pages.artistSingle', ['artist' => $artist], ['posts' => $posts, 'exhibitions' => $exhibitions]);
    }

    public function exhibitionSingle($id)
    {
        $exhibition = Exhibition::where('id', $id)->firstOrFail();
        $exhibitionsFuture = Exhibition::whereDate('date_start', '>', Carbon::now()->today())->get();
        return view('pages.exhibitionSingle', ['exhibition' => $exhibition], ['exhibitionsFuture' => $exhibitionsFuture]);
    }


    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->where('is_published', '1')->paginate(3);
        return view('pages.list', ['posts' => $posts]);

    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->where('is_published', '1')->paginate(3);
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
