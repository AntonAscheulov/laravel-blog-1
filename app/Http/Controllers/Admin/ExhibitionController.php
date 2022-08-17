<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Exhibition\CreateExhibitionRequest;
use App\Http\Requests\Admin\Exhibition\DestroyExhibitionRequest;
use App\Http\Requests\Admin\Exhibition\EditExhibitionRequest;
use App\Http\Requests\Admin\Exhibition\IndexExhibitionRequest;
use App\Http\Requests\Admin\Exhibition\ShowExhibitionRequest;
use App\Http\Requests\Admin\Exhibition\StoreExhibitionRequest;
use App\Http\Requests\Admin\Exhibition\UpdateExhibitionRequest;
use App\Models\Artist;
use App\Models\Exhibition;

class ExhibitionController extends Controller
{

    public function index(IndexExhibitionRequest $request)
    {
        $exhibitions = Exhibition::paginate(6);

        return view('admin.exhibitions.index', ['exhibitions' => $exhibitions]);
    }


    public function create(CreateExhibitionRequest $request)
    {
        $artists = Artist::pluck('artist_name', 'id')->all();
        return view('admin.exhibitions.create', ['artists' => $artists]);
    }


    public function store(StoreExhibitionRequest $request, Exhibition $exhibition)
    {
        $exhibition = Exhibition::create($request->validated());
        $exhibition->setArtist($request->get('artist_id'));
        return redirect()->route('admin.exhibitions.index');
    }


    public function show(ShowExhibitionRequest $request, Exhibition $exhibition)
    {
        //
    }


    public function edit(EditExhibitionRequest $request, Exhibition $exhibition)
    {
        $artists = Artist::pluck('artist_name', 'id')->all();
        return view('admin.exhibitions.edit', [ 'exhibition' => $exhibition, 'artists' => $artists]);
    }


    public function update(UpdateExhibitionRequest $request, Exhibition $exhibition)
    {
        $exhibition->update($request->validated());
        $exhibition->setArtist($request->get('artist_id'));
        return redirect()->route('admin.exhibitions.index');
    }


    public function destroy(DestroyExhibitionRequest $request, Exhibition $exhibition)
    {
        $exhibition->delete();
        return redirect()->route('admin.exhibitions.index');
    }
}
