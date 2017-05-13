<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;
use Auth;
use App\Photo;
use App\Category;
use Image;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // hmmmm
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Photo::class);

        $categories = Category::byOwner(Auth::user()->id)->get();

        return view('photo.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PhotoRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoRequest $request)
    {
        $this->authorize('create', Photo::class);

        // Resize image
        $resizedImage = Image::make($request->file('photo'))->resize(800, 600, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // Save image
        Photo::create([
            'id_category' => $request->category,
            'photo'       => $resizedImage->encode('png'),
            'description' => $request->description,
        ]);

        $category = Category::find($request->category);

        return redirect()->action('CategoryController@show', [$category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo $photo
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        $this->authorize('view', $photo);

        return view('photo.show', ['photo' => $photo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo $photo
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $this->authorize('update', $photo);

        $categories = Category::byOwner(Auth::user()->id)->get();

        return view('photo.edit', ['photo' => $photo, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PhotoRequest $request
     * @param  \App\Photo   $photo
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoRequest $request, Photo $photo)
    {
        $this->authorize('update', $photo);

        $photo->update([
            'id_category' => $request->category,
            'description' => $request->description,
        ]);

        $category = Category::find($request->category);

        return redirect()->action('CategoryController@show', [$category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo $photo
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $this->authorize('delete', $photo);

        $category = Category::find($photo->id_category);

        $photo->delete();

        return redirect()->action('CategoryController@show', [$category]);
    }
}
