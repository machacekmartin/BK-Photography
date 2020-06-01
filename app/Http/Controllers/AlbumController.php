<?php

namespace App\Http\Controllers;

use App\Album;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('name', 'id')->get();
        return view('admin.albums.index', 
        [
            'albums' => Album::all(), 
            'categories' => $categories
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'thumbnail' => 'nullable',
            'category_id' => 'required'
        ]);
        Album::create($valid);
        return redirect(route('admin.albums'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $categories = Category::select('name', 'id')->get();
        return view('admin.albums.show', ['album' => $album, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $valid = $request->validate([
            'name' => 'required',
            'thumbnail' => 'nullable|image',
            'category_id' => 'required'
            
        ]);
        if ($image = $request->file('thumbnail')){
            Storage::delete(Storage::files('public/album-'.$album->id.'/thumbnail'));
            $valid['thumbnail'] = $image->getClientOriginalName();
            Storage::disk('public')->putFileAs('album-'.$album->id.'/thumbnail', $image, $valid['thumbnail']);
        }
        $album->update($valid);
        return redirect('/admin/albums/'.$album->id.'/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        Album::destroy($album->id);
        return redirect('/admin/albums');
    }
}
