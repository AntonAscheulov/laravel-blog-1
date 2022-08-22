<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Artist\CreateArtistRequest;
use App\Http\Requests\Admin\Artist\DestroyArtistRequest;
use App\Http\Requests\Admin\Artist\EditArtistRequest;
use App\Http\Requests\Admin\Artist\IndexArtistRequest;
use App\Http\Requests\Admin\Artist\ShowArtistRequest;
use App\Http\Requests\Admin\Artist\StoreArtistRequest;
use App\Http\Requests\Admin\Artist\UpdateArtistRequest;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(IndexArtistRequest $request)
    {
        $artists = Artist::paginate(10);

        return view('admin.artists.index', ['artists' => $artists]);
    }

    public function create(CreateArtistRequest $request)
    {
        return view('admin.artists.create');
    }

    public function store(StoreArtistRequest $request)
    {
        Artist::create($request->validated());
        return redirect()->route('admin.artists.index');
    }

    public function show(ShowArtistRequest $request,  Artist $artist)
    {
        //
    }

    public function edit(EditArtistRequest $request, Artist $artist)
    {
        return view('admin.artists.edit', ['artist' => $artist]);
    }

    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        $artist->update($request->validated());
        return redirect()->route('admin.artists.index');
    }

    public function destroy(DestroyArtistRequest $request, Artist $artist)
    {
        $artist->delete();
        return redirect()->route('admin.artists.index');
    }
}
