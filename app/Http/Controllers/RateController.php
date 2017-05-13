<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Photo;
use App\Rate;
use Auth;

class RateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Photo $photo)
    {
        $this->authorize('view', $photo);

        return back();
    }

    public function store(RateRequest $request)
    {
        $photo = Photo::find($request->photo);
        $this->authorize('create', $photo);

        $user = Auth::user()->id;

        Rate::create([
            'id_user' => $user,
            'id_photo' => $request->photo,
            'rate' => $request->rate,
        ]);

        return back();
    }
}
